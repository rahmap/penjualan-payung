<?php

function alertBS($message, $title, $type)
{
  return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>'.$title.'</strong> '.$message.'
                </div>';
}

function sweetAlert($title = '', $text = '', $type = '')
{
  return "<script>
        var title = '$title';
        var text = '$text'; 
        var icon = '$type';
//        var timer = '1500';
        var showConfirmButton = false;
        Swal.fire({title, text, icon, showConfirmButton, timer : 3000})
        </script>";
}


function sweetAlertHref($title = '', $text = '', $type = '', $href = '')
{
  return "<script>
        var title = '$title';
        var text = '$text'; 
        var type = '$type';
        Swal.fire(title,text,type).then(function() {
                window.location = '$href';
            });
        </script>";
}

function ganti($a)
{
  return getenv('app.baseURL');
}

