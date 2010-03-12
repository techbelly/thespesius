<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>My Google AJAX Search API Application</title>
    <script src="http://www.google.com/jsapi?key=ABQIAAAAnIUhKDfSNJFWkVoUWONLVxTFsA9bbx2AVWNPXMQ_uXdNDtdZShQxqvvSX6-Ld9lHkMQSiQAt9lTKpA" type="text/javascript"></script>
    <script language="Javascript" type="text/javascript">
    //<![CDATA[

    google.load("search", "1");

    function initialize() {
      // Create a search control
      var searchControl = new google.search.SearchControl();
      var siteSearch = new google.search.WebSearch();
      var options = new google.search.SearcherOptions();
      options.setExpandMode(google.search.SearchControl.EXPAND_MODE_OPEN);
      options.setRoot(document.getElementById("bah"));
      // Add in a full set of searchers
      searchControl.addSearcher(siteSearch,options);
      siteSearch.setUserDefinedLabel("Data.gov");
      siteSearch.setUserDefinedClassSuffix("siteSearch");
      siteSearch.setSiteRestriction("http://data.gov.uk/dataset/*");
      // Tell the searcher to draw itself and tell it where to attach
      searchControl.draw(document.getElementById("searchcontrol"));
      
      // Execute an inital search
      searchControl.execute("<?php echo $_REQUEST['search']; ?>");
      
      //searchControl.execute("crime");
    }
    google.setOnLoadCallback(initialize);

    //]]>
    </script>
    <style>
    .gs-webResult .gs-visibleUrl-short { display:none; }
    .gs-webResult {
        line-height: 1.4em;
        font-family: verdana, helvetica, arial, sans-serif;
        font-size: 12px;
        color: rgb(13, 48, 89);
    }
    .gsc-resultsHeader { display:none; }
    div.gs-title {
        color: rgb(31, 82, 123);
        padding: 0 18px ;
        background-image:url('http://www.techbelly.com/table.png');
        background-repeat:no-repeat;
        background-position:bottom left;
    }
    h1 {
        color: rgb(102, 102, 102);
        font-size: 12px;
        font-weight: normal;
    }
    </style>
  </head>
  <body>
    <h1>DATA.GOV datasets</h1>
    <div id="searchcontrol" style="visibility:hidden; float:right; position:absolute;">Loading...</div>
    <div style="width:240px" id="bah" ></div>
  </body>
</html>