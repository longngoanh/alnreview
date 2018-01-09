<?php

//function getContentFromFile($szFileName) {
//    $szFileContent = "";
//    $myFile = fopen($szFileName, "r") or die("Unable to open file " .$szFileName. "!");
//    $szFileContent = fread($myFile, filesize($szFileName));
//    fclose($myFile);
//    return $szFileContent;
//}


function OpenHTML($aszCssResource = null, $aszJsResource = null, $bIsAddBootstrapFW = true, $szTitle = "") {
    $szHtml = "";

    if (empty($szTitle)) {
        $szTitle = "Aln Review, share and share !!!";
    }

    $szHtml .= <<< EOD
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>$szTitle</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
EOD;
    if ($bIsAddBootstrapFW) {
        $szHtml .= AddBootstrapAndJqueryResource();
    }

    if ($aszCssResource) {
        foreach ($aszCssResource as $szCssResource) {
            $szHtml .= AddCssResource($szCssResource);
        }
    }

    if ($aszJsResource) {
        foreach ($aszJsResource as $szJsResource) {
            $szHtml .= AddJsResource($szJsResource);
        }
    }

    $szHtml .= <<< EOD
    </head>
        <body class="bgcolor" id="myPage"></body>
EOD;

    return $szHtml;
}

function CloseHTML() {
    $szHtml = "";
    $szHtml .= <<< EOD
        </body>
    </html>
EOD;
    return $szHtml;
}

function AddBootstrapAndJqueryResource() {
    $szHtml = "";
    // Bootstrap css
    $szHtml .= AddCssResource('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    // Jquery 
    $szHtml .= AddJsResource('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
    // Bootstrap JS 
    $szHtml .= AddJsResource('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

    return $szHtml;
}

function AddCssResource($szLink) {
    return '<link rel="stylesheet" href="' . $szLink . '">';
}

function AddJsResource($szLink) {
    return '<script src="' . $szLink . '"></script>';
}

function AddNavigationBar() {
    $szHtml = "";
    $szHtml .= '
        <nav class="container-fluid navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="images/adminUpload/logo1.jpg" style="width: 120px"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home">HOME</a></li>
                        <li><a href="#band">BAND</a></li>
                        <li><a href="#tour">TOUR</a></li>
                        <li><a href="#contact">CONTACT</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Merchandise</a></li>
                                <li><a href="#">Extras</a></li>
                                <li><a href="#">Media</a></li> 
                            </ul>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
    ';

    return $szHtml;
}

function GetMainContentArea($szContent) {
    $szHtml = '
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-8 main-content">
                ' . $szContent . '
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2"></div> 
            </div>
        </div>
    ';
    return $szHtml;
}

function GetImageSlider() {
    $szHtml = "";
    $szHtml .= <<< EOD
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/adminUpload/pic1.jpg" alt="New York">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>The atmosphere in New York is lorem ipsum.</p>
                    </div> 
                </div>

                <div class="item">
                    <img src="images/adminUpload/pic2.jpg" alt="Chicago">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago - A night we won't forget.</p>
                    </div> 
                </div>

                <div class="item">
                    <img src="images/adminUpload/pic3.jpg" alt="Los Angeles">
                    <div class="carousel-caption">
                        <h3>LA</h3>
                        <p>Even though the traffic was a mess, we had the best time.</p>
                    </div> 
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
EOD;
    return $szHtml;
}

function GetTopViewArticles() {
    $szHtml = "";
    $szHtml .= <<< EOD
        <div class="row">
            <div class="col-xs-4">
                <div class="thumbnail">
                    <a href="/w3images/lights.jpg" target="_blank">
                        <img src="https://www.w3schools.com/w3images/lights.jpg" alt="Lights" style="width:100%">
                        <div class="caption">
                            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="thumbnail">
                    <a href="/w3images/nature.jpg" target="_blank">
                        <img src="https://www.w3schools.com/w3images/nature.jpg" alt="Nature" style="width:100%">
                        <div class="caption">
                            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="thumbnail">
                    <a href="/w3images/fjords.jpg" target="_blank">
                        <img src="https://www.w3schools.com/w3images/fjords.jpg" alt="Fjords" style="width:100%">
                        <div class="caption">
                            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
EOD;
    return $szHtml;
}

function GetShowArticlesArea() {
    $szHtml = "";
    $szHtml .= <<< EOD
    
        <div id="showArticles">
            <div class="container-fluid row">
                <a href=""><h2>Cách bỏ đường gạch đứt màu đỏ trong Word</h2></a>
                <p><span>Máy tính </span>04/01/2018</p> 
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="images/parkinson.jpg" class="img-rounded" alt="Cinque Terre" style="width: 100%">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8"> 
                        Một nghiên cứu mới đây cho thấy mức caffein trong máu có thể giúp chẩn đoán bệnh nhân bị bệnh Parkinson.
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid row">
                <a href=""><h2>Doanh số iPhone có thể sụt giảm đến 16 triệu máy vì vụ lùm xùm về pin</h2></a>
                <p><span>Kinh doanh </span>04/01/2018</p> 
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="images/iphone.jpg" class="img-rounded" alt="Cinque Terre" style="width: 100%">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8"> 
                        Theo các nhà phân tích từ tập đoàn đầu tư Barclays Capital, vụ bê bối liên quan việc làm giảm hiệu năng các iPhone bị chai pin của Apple vừa qua sẽ khiến doanh số iPhone trong năm 2018 của hãng sụt giám đến 16 triệu máy.
                    </div>
                </div>
            </div>
            <hr>

            <div class="container-fluid row">
                <a href=""><h2>Cách bỏ đường gạch đứt màu đỏ trong Word</h2></a>
                <p><span>Máy tính </span>04/01/2018</p> 
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="images/parkinson.jpg" class="img-rounded" alt="Cinque Terre" style="width: 100%">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8"> 
                        Một nghiên cứu mới đây cho thấy mức caffein trong máu có thể giúp chẩn đoán bệnh nhân bị bệnh Parkinson.
                    </div>
                </div>
            </div>
            <hr>

            <div class="container-fluid row">
                <a href=""><h2>Cách bỏ đường gạch đứt màu đỏ trong Word</h2></a>
                <p><span>Máy tính </span>04/01/2018</p> 
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="images/parkinson.jpg" class="img-rounded" alt="Cinque Terre" style="width: 100%">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8"> 
                        Một nghiên cứu mới đây cho thấy mức caffein trong máu có thể giúp chẩn đoán bệnh nhân bị bệnh Parkinson.
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <br>
        <div class="row">
            <button type="button" class="btn btn-success center-block"> Xem thêm bài viết </button>
        </div>   
        <br>
        <hr>

EOD;

    return $szHtml;
}

function GetFooterPage() {
    $szHtml = "";
    $szHtml .= <<< EOD
        <footer class="text-center footer">

            <a href="#myPage" title="To Top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
            <p>Bootstrap Theme Made By <a href="https://www.w3schools.com" title="Visit w3schools">www.w3schools.com</a></p>
        </footer>      
EOD;
    return $szHtml;
}

function GetTextEditorArea() {
    $szHtml = "";
    $szHtml .= <<<EOD
        <div>
            <h2 class="text-center" style="padding: 30px 40px;" > Thoải mái chia sẻ điều bạn nghĩ !!! </h2>
            <div class="form-group">
                <input type="text" class="form-control input-lg" id="usr" placeholder="Tiêu đề câu chuyện">
            </div>
            
            <br>
            <div id="alerts"></div>
            <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font"><i class="icon-font"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li><li><a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li><li><a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li><li><a data-edit="fontName Arial Black" style="font-family:'Arial Black'">Arial Black</a></li><li><a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a></li><li><a data-edit="fontName Courier New" style="font-family:'Courier New'">Courier New</a></li><li><a data-edit="fontName Comic Sans MS" style="font-family:'Comic Sans MS'">Comic Sans MS</a></li><li><a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a></li><li><a data-edit="fontName Impact" style="font-family:'Impact'">Impact</a></li><li><a data-edit="fontName Lucida Grande" style="font-family:'Lucida Grande'">Lucida Grande</a></li><li><a data-edit="fontName Lucida Sans" style="font-family:'Lucida Sans'">Lucida Sans</a></li><li><a data-edit="fontName Tahoma" style="font-family:'Tahoma'">Tahoma</a></li><li><a data-edit="fontName Times" style="font-family:'Times'">Times</a></li><li><a data-edit="fontName Times New Roman" style="font-family:'Times New Roman'">Times New Roman</a></li><li><a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a></li></ul>
                </div>
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                        <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                        <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <a class="btn" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
                    <a class="btn" data-edit="italic" title="" data-original-title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
                    <a class="btn" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class="icon-strikethrough"></i></a>
                    <a class="btn" data-edit="underline" title="" data-original-title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
                </div>
                <div class="btn-group">
                    <a class="btn" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class="icon-list-ul"></i></a>
                    <a class="btn" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class="icon-list-ol"></i></a>
                    <a class="btn" data-edit="outdent" title="" data-original-title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
                    <a class="btn" data-edit="indent" title="" data-original-title="Indent (Tab)"><i class="icon-indent-right"></i></a>
                </div>
                <div class="btn-group">
                    <a class="btn btn-info" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
                    <a class="btn" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
                    <a class="btn" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
                    <a class="btn" data-edit="justifyfull" title="" data-original-title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
                </div>
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Hyperlink"><i class="icon-link"></i></a>
                    <div class="dropdown-menu input-append">
                        <input class="span2" placeholder="URL" type="text" data-edit="createLink">
                        <button class="btn" type="button">Add</button>
                    </div>
                    <a class="btn" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><i class="icon-cut"></i></a>

                </div>

                <div class="btn-group">
                    <a class="btn" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)"><i class="icon-picture"></i></a>
                    <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 37px; height: 30px;">
                </div>
                <div class="btn-group">
                    <a class="btn" data-edit="undo" title="" data-original-title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                    <a class="btn" data-edit="redo" title="" data-original-title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
                </div>
                <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="" style="display: none;">
            </div>

            <div id="editor" class="dropArea" contenteditable="true">

            </div>
            
            <div class="container-fluid row">
                <button type="button" class="btn btn-warning pull-right btn-lg" style="margin: 15px 15px">Hoàn tất</button>
            </div>
            
            <script>
                $(function () {
                    function initToolbarBootstrapBindings() {
                        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                            'Times New Roman', 'Verdana'],
                                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                        $.each(fonts, function (idx, fontName) {
                            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                        });
                        $('a[title]').tooltip({container: 'body'});
                        $('.dropdown-menu input').click(function () {
                            return false;
                        })
                                .change(function () {
                                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                                })
                                .keydown('esc', function () {
                                    this.value = '';
                                    $(this).change();
                                });

                        $('[data-role=magic-overlay]').each(function () {
                            var overlay = $(this), target = $(overlay.data('target'));
                            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                        });
                        if ("onwebkitspeechchange"  in document.createElement("input")) {
                            var editorOffset = $('#editor').offset();
                            $('#voiceBtn').css('position', 'absolute').offset({top: editorOffset.top, left: editorOffset.left + $('#editor').innerWidth() - 35});
                        } else {
                            $('#voiceBtn').hide();
                        }
                    }
                    ;
                    function showErrorAlert(reason, detail) {
                        var msg = '';
                        if (reason === 'unsupported-file-type') {
                            msg = "Unsupported format " + detail;
                        } else {
                            console.log("error uploading file", reason, detail);
                        }
                        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                    }
                    ;
                    initToolbarBootstrapBindings();
                    $('#editor').wysiwyg({fileUploadError: showErrorAlert});
                    window.prettyPrint && prettyPrint();
                });
            </script>
        </div>
        
EOD;
    return $szHtml;
}
