
<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "info@stemtech.online"; 
      $mailFrom = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $mailFrom)){
         echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
         <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
           <div class="toast-header">
             <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
           </div>
           <div class="toast-body">
           Your message has been sent
           </div>
         </div>
       </div>';
          
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>