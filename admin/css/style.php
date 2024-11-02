   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

   <!-- Bootstrap Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <style>
     :root {
       --teal: #2ec1ac;
       --teal_hover: #279e8c;
     }

     /* Global font styles */
     * {
       font-family: "Poppins", sans-serif;
     }

     /* Header font style */
     .h-font {
       font-family: "Merienda", cursive;
     }

     .custom-bg {
       background-color: var(--teal);
       border: 1px solid var(--teal);
     }

     .custom-bg:hover {
       background-color: var(--teal_hover);
       border-color: var(--teal_hover);
     }

     /* Chrome, Safari, Edge, Opera */
     input::-webkit-outer-spin-button,
     input::-webkit-inner-spin-button {
       -webkit-appearance: none;
       margin: 0;
     }

     .h-line {
       width: 150px;
       margin: 0 auto;
       height: 1.7px;
     }

     .custom-alert {
       position: fixed;
       /* Fixed positioning */
       top: 20px;
       /* Position from the top */
       right: 20px;
       /* Position from the right */
       z-index: 1050;
       /* Ensure it appears above other content */
       width: calc(100% - 40px);
       /* Responsive width */
       max-width: 500px;
       /* Set a maximum width */
     }

     #dashboard-menu {
       position: fixed;
       height: 100%;
       z-index: 11;
     }

     body::-webkit-scrollbar {
       width: 5px;
     }

     /* width */
     ::-webkit-scrollbar {
       width: 10px;
     }

     /* Track */
     ::-webkit-scrollbar-track {
       background: #f1f1f1;
     }

     /* Handle */
     ::-webkit-scrollbar-thumb {
       background: #888;
     }

     /* Handle on hover */
     ::-webkit-scrollbar-thumb:hover {
       background: #555;
     }

     @media screen and (max-width: 991px) {
       #dashboard-menu {
         height: auto;
         width: 100%;
       }

       #main-content {
         margin-top: 60px;
       }

     }

     .team-card {
       height: 300px;
       /* Adjust height as needed */
     }

     .team-card img {
       height: 100%;
       /* Make the image fill the card */
       object-fit: cover;
       /* Ensure the image maintains its aspect ratio */
     }
   </style>