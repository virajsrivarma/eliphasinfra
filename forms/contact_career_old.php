<?php

if (isset($_POST['contact_btn']) && $_POST['contact_btn'] == 'contact') {
  $to = "info@eliphas.in";
  $subject = $_POST['subject'];

  $message = "
  <table>
    <tr>
      <th>Name: </th>
      <td>".$_POST['name']."</td>
      </tr>
    <tr>
      <th>Email: </th>
      <td>".$_POST['email']."</td>
    </tr>
    <tr>
      <th>Subject: </th>
      <td>".$_POST['subject']."</td>
    </tr>
    <tr>
      <th>Message: </th>
      <td>".$_POST['message']."</td>
    </tr>
  </table>
  ";
  function mail_sent($to, $subject, $message);
}

if (isset($_POST['contact_btn']) && $_POST['contact_btn'] == 'contact') {
  $to = "info@eliphas.in";
  $subject = $_POST['subject'];

  $message = "
  <table>
    <tr>
      <th>Name: </th>
      <td>".$_POST['name']."</td>
      </tr>
    <tr>
      <th>Email: </th>
      <td>".$_POST['email']."</td>
    </tr>
    <tr>
      <th>Subject: </th>
      <td>".$_POST['subject']."</td>
    </tr>
    <tr>
      <th>Message: </th>
      <td>".$_POST['message']."</td>
    </tr>
  </table>
  ";
  function mail_sent($to, $subject, $message);
}



function mail_sent($to, $subject, $message)
{
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: info@eliphas.in' . "\r\n" . 'Reply-To: info@eliphas.in' . "\r\n";
  // $headers .= 'Cc: myboss@example.com' . "\r\n";

  if (mail($to,$subject,$message,$headers)) {
    echo "Message sent Successfully";
  }else{
    echo "failed";
  }
}