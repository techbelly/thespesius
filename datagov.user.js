// ==UserScript==
// @name           DATAGOV
// @namespace      http://www.techbelly.com
// @description    Insert data.gov datasets into BBC news website
// @include        http://news.bbc.co.uk/*
// ==/UserScript==

var keywords = [
	"british crime survey",
	"crime reduction",
	"alcohol",
	"fear of crime",
	"gun crime",
	"knife crime",
	"home office",
	"anti-social behaviour",
	"crime",
	"justice",
	"police",
	"harassment",
	"vandalism",
	"arrests",
	"stop and search",
	"sexual offences",
	"offender",
	"probation",
	"asbo",
	"sentencing",
	"offences",
	"criminal justice",
	"convictions",
	"court statistics",
	"burglary",
	"criminal records",
	"crown prosecution service",
	"domestic abuse",
	"drug seizures",
	"drug use"
];

var articleX = document.evaluate("//text()[ancestor::td[@class='storybody']]"							,
	document.body,
    null, 
    XPathResult.UNORDERED_NODE_SNAPSHOT_TYPE, 
	null);

var search_terms = [];
for (var i = 0; i < articleX.snapshotLength; i++) {
	var article = articleX.snapshotItem(i);
	var articleText = article.nodeValue.toLowerCase();
	for (var j=0; j < keywords.length; j++) {
		if (articleText.indexOf(keywords[j]) != -1) {
			search_terms.push(keywords[j]);
		}
	}
}

var search = search_terms.slice(0,3).join(" ");
var myframe = document.createElement("iframe");
myframe.id = "datagov";
myframe.setAttribute("style", "padding : 0; border:0; height:480px");
myframe.setAttribute("src","http://www.techbelly.com/rw_search.php?search="+search);
myframe.setAttribute("scrolling","no");

var sidebar = document.getElementsByClassName("storyextra");
if (sidebar.length >= 1) {
	var seealso = document.getElementsByClassName("seeAlsoH")[0];
	sidebar[0].insertBefore(myframe,seealso);
}