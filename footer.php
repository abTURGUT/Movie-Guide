<head>
   <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
   <script src="functions.js"></script>
</head>

<body>
   <?php date_default_timezone_set("Asia/Istanbul"); ?>
   <div class = "footer">
      <table class = "footerTable">
         <tr>
            <td> <p = class = "footerGlow"> Tayyib Bayram </p></td><td class = "footerGlow"> <p = class = "footerGlow"> Abdullah Turğut </p></td>
            <td> <p = class = "footerGlow"> Time </p></td> <td> <p = class = "footerGlow"> Date </p></td>
         </tr>
         <tr>
            <td> <p = class = "footerGlow"> 030118106 </p></td> <td> <p = class = "footerGlow"> 030118062 </p></td>
            <td> <p = class = "footerGlow" id = "timeText" onload = "timer();"></p></td> <td> <p = class = "footerGlow"> <?php echo date('d/M/y'); ?></p></td>
         </tr>
      </table>
   </div>
     <script type="text/javascript"> timer();</script>
</body>

