function NewsFeedItem(href,title)
{
	this.anchor = document.createElement("a");

	this.anchor.href = href;
	this.anchor.innerHTML = title;

}

function NewsFeed()
{
	this.feeds=new Array();
	this.xhr=new XMLHttpRequest();
	othis=this;
	this.srctimer=null;

	this.div=document.getElementById("inner");
	
	this.div.style.left=window.innerWidth-5+"px";
	this.div.onmouseover=this.stopScroll;
	this.div.onmouseout=this.scroll;

	this.scroll();
	this.getFeeds();

}

NewsFeed.prototype.getFeeds=function() {

	this.xhr.onreadystatechange=this.showNews;
	this.xhr.open("GET","http://localhost/SEE/rss/getnews.php",true);
	this.xhr.send();
}

NewsFeed.prototype.showNews=function() {

	if(this.readyState==4 && this.status==200)
	{
		root=this.responseXML.documentElement;
		items=root.getElementsByTagName("item");
		othis.div.innerHTML="";
		for(i=0;i<5;i++)
		{
			item=items[i];
			link=item.getElementsByTagName("link")[0];
			title=item.getElementsByTagName("title")[0];
			
			newsitem=new NewsFeedItem(link.firstChild.nodeValue,title.firstChild.nodeValue);

			othis.div.appendChild(newsitem.anchor);
			othis.div.innerHTML += "&nbsp;&nbsp;&nbsp;&nbsp;";
		}
	}
}

NewsFeed.prototype.scroll=function()
{
	if(othis.div.offsetLeft+othis.div.offsetWidth<2)
	{
		othis.div.style.left=window.innerWidth-5+"px";
	}
	else
	{
		othis.div.style.left=othis.div.offsetLeft - 5+"px";
	}
	othis.srctimer=setTimeout(othis.scroll,50);
}

NewsFeed.prototype.stopScroll=function() {

	if(othis.srctimer)
	{
		clearTimeout(othis.srctimer);
	}
}

function init()
{
	new NewsFeed();
}

	
