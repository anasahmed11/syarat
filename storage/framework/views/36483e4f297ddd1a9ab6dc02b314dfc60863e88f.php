
<!DOCTYPE html>
<html>
<head>
    <title>www.hossamghozal.com</title>
</head>
<body style="background-color: black;padding: 65px">
<img src="http://www.hossamghozal.com/public/images/logo.png" >
<h5 style="color: white">Name : <?php echo e($details['name']); ?></h5>
<h5 style="color: white">Email : <?php echo e($details['email']); ?></h5>
<h5 style="color: white">Phone : <?php echo e($details['phone']?$details['phone']:''); ?></h5>
<p style="color: white">Message :<?php echo e($details['message']); ?></p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\hossam-ghozal\resources\views/emails/reply.blade.php ENDPATH**/ ?>