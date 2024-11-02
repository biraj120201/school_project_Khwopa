<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- css for index -->
  <style>


    :root {
      --teal: #2ec1ac;
      --teal_hover: #279e8c;
    }

    /* edited */
    * {
      font-family: "poppins", arial;
    }

    .h-font {
      font-family: "Merienda", arial;
    }

    .custom-bg {
  background-color: #2ec1ac; /* Keep this as the permanent color */
  border: 1px solid #2ec1ac; /* Keep this as the permanent border color */
}

/* Remove hover styles to prevent color change */
.custom-bg:hover {
  background-color: #2ec1ac; /* Keep the original background */
  border-color: #2ec1ac; /* Keep the original border */
  color: inherit; /* Keep the original text color */
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


    .availability-form {
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }

    @media screen and (max-width: 575px) {
      .availability-form {
        margin-top: 25px;
        padding: 0 35px;
      }
    }
    .custom-alert {
    position: fixed; /* Fixed positioning */
    top: 20px; /* Position from the top */
    right: 20px; /* Position from the right */
    z-index: 1050; /* Ensure it appears above other content */
    width: calc(100% - 40px); /* Responsive width */
    max-width: 500px; /* Set a maximum width */
  }
  </style>