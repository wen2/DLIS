<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SC&I Digital Library</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <!-- jQuery Version 1.11.0 -->

    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
        rel="stylesheet" type="text/css">

    <script type="text/javascript">
$(document).ready(function(){ 
    $("#myTab li:eq(1) a").tab('show');
});
    </script>

    <style type="text/css">
        .bs-example
        {
            margin: 20px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <div id="row1" class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        Quick <strong>Search</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-9">
                    <div class="bs-example">
                        <ul class="nav nav-tabs" id="myTab">
                            <li><a data-toggle="tab" href="#sectionA">Articles</a></li>
                            <li><a data-toggle="tab" href="#sectionB">Books</a></li>
                            <li><a data-toggle="tab" href="#sectionC">Journals</a></li>
                            <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Databases
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a data-toggle="tab" href="#dropdown1">Books</a></li>
                                    <li><a data-toggle="tab" href="#dropdown2">Articles</a></li>
									<li><a data-toggle="tab" href="#dropdown3">Journals</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="sectionA" class="tab-pane fade in active">
                                <h3>
                                    Articles</h3>
                                <form id="Form1" action="Result_Articles.php" method="get">
                                <div style="text-align: left; margin: 5px 0 5px 14px;">
                                    <input id="SearchArticle" name="SearchArticle" type="text" style="margin-left: 0px; width: 355px;" placeholder="Search for articles and more...">
                                    <input type="submit" value="Search" />
                                </div>
                                <!-- Dropdown menu to prepend search option values -->
                                <div style="text-align: left; margin: 5px 0 0 14px;">
                                    <select id="optArticle"  name="optArticle" onchange="" style="margin-left: 0px; width: 355px;">
                                        <option selected="selected" value="">Keyword</option>
                                        <option value="TI ">Title</option>
                                        <option value="AU ">Author</option>
                                    </select>
                                </div>
                                </form>
								</br>There are 1,045 articles. Article Data from <a href="http://www.odditysoftware.com/download/download.php?filename=2006_10_9_Success.zip">Success Articles Database</a>.
                            </div>
                            <!---------------------------------------->
                            <div id="sectionB" class="tab-pane fade">
                                <h3>
                                    Books</h3>
                  
		<form id="frmBooks" action="Result_Books.php" method="get">
                                <div style="text-align: left; margin: 5px 0 5px 14px;">
                                    <input id="SearchText" name="SearchText" type="text" style="margin-left: 0px; width: 355px;" placeholder="Search for books and more...">
                                    <input type="submit" value="Search" />
                                </div>
                                <!-- Dropdown menu to prepend search option values -->
                                <div style="text-align: left; margin: 5px 0 0 14px;">
                                    <select id="opt" onchange="" name="opt" style="margin-left: 0px; width: 355px;">
                                        <option selected="selected" value="">Words anywhere</option>
                                        <option value="TP">Title begins with (omit first article)</option>
                                        <option value="AP">Author (first name first)</option>
                                        <option value="ISBN">ISBN</option>
                                    </select>
                                </div>
                                </form>
								</br>There are 268,782 books. Book Data from <a href="//amazon.com/books"><img src="images\amazon.png" alt="amazon" style="width:75px;"/></a>.
                            </div>
                            <div id="sectionC" class="tab-pane fade"><!-------------------------->
                                <h3>
                                    Journals</h3>
                                <form id="frmJournals" action="Result_Journals.php" method="get">
                                <div style="text-align: left; margin: 5px 0 5px 14px;">
                                    <input id="SearchJournal" name="SearchJournal" type="text" style="margin-left: 0px; width: 355px;" placeholder="Search for journals, magazines, and newspapers...">
                                    <input type="submit" value="Search" />
                                </div>
                                <!-- Dropdown menu to prepend search option values -->
                                <div style="text-align: left; margin: 5px 0 0 14px;">
                                    <select id="optJournal" onchange="" name="optJournal" style="margin-left: 0px; width: 355px;">
                                        <option selected="selected" value="PP">Journal title begins with</option>
                                        <option value="KP">Journal title keyword</option>
                                    </select>
                                </div>
                              </form>
							  </br>There are 10,055 journals. Journal Data from <a href="http://doaj.org/csv">Directory of Open Access Journals </a>.
                            </div>
                            <div id="dropdown1" class="tab-pane fade">
                                <h3><a href="www.amazon.com/books‎">Amazon</a></h3>
                                <p>
                                   Amazon.com began as an online bookstore, an idea spurred off with discussion with John Ingram of Ingram Book (now called Ingram Content Group), along with Keyur Patel who still holds a stake in Amazon. In the first two months of business, Amazon sold to all 50 states and over 45 countries. Within two months, Amazon's sales were up to $20,000/week. While the largest brick and mortar bookstores and mail order catalogs might offer 200,000 titles, an online bookstore could "carry" several times more, since they had an almost unlimited virtual (not actual) warehouse: those of the actual product makers/suppliers.</p>
                            </div>
                            <div id="dropdown2" class="tab-pane fade">
                                <h3><a href="http://www.odditysoftware.com/free_lists.html">ODDITY SOFTWARE</a></h3>
                                <p>
                                    Sometimes you just need to save time. All to often as a developer you have a need for a list of states, or something to that effect that will only take an hour to compile. But an hour is precious with a schedule that's packed. The download lists on these pages are meant to serve but one purpose, and that is to make life a little bit easier. If you find a list you like or need feel free to download it. If you have a list of your own that you would like to contribute, send it our way and we'll post it.</p>
                            </div>
							<div id="dropdown3" class="tab-pane fade">
                                <h3><a href="http://doaj.org/">DOAJ</a></h3>
                                <p>
                                    The DOAJ service supports the OAI protocol for metadata harvesting (OAI-PMH). Thus, any OAI compatible service can obtain records from DOAJ. The OAI data is always up to date. OAI is well-established and easy to use. The base URL is: http://www.doaj.org/oai. You can add most OAI verbs and other commands directly on to that. Read a full description of this service here. Our current OAI offering is standardised around Dublin Core. We will expanding the metadata in it in the latter half of 2014.

</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
       <div id="row2" class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                     <h2 class="intro-text text-center">Directly Browse
                        <strong>Database</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
				<a href="List_Books.php"><img src="images\books2.jpeg" alt="Books" height="250" width="250"></a>
                    
                </div>
                <div class="col-sm-4 text-center">
                    <a href="List_Articles.php"><img src="images\articles2.jpeg" alt="Articles" height="250" width="250"></a>
                </div>
                <div class="col-sm-4 text-center">
				<a href="List_Journals.php"><img src="images\journals2.jpeg" alt="Journals" height="250" width="250"></a>
                    
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
				
    </div>
    <!-- /.container -->
<?php include 'footer.php'; ?>
	</body>
</html>
