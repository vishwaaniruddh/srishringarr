<?php include('./header.php'); ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .header h1 {
            font-size: 2.5rem;
            color: #333333;
        }
        .client-entry {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 2rem;
            border-bottom: 1px solid #ddd;
            padding-bottom: 2rem;
        }
        .client-entry img,
        .client-entry video {
            max-width: 100%;
            border-radius: 8px;
        }
        .client-info {
            flex: 1;
        }
        .client-info h2 {
            color: #333333;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .client-info p {
            color: #555555;
            font-size: 1rem;
            line-height: 1.6;
        }
        .media-section {
            display: flex;
            gap: 15px;
        }
        .media-section img,
        .media-section video {
            width: 48%;
        }
        .footer {
            text-align: center;
            font-size: 0.9rem;
            color: #777777;
            margin-top: 1rem;
        }
        .client_photo{
            height:300px;
                object-fit: contain;
        }
    </style>

<body>
    <div class="container">
        <div class="header">
            <h1>Client Diary</h1>
            <p>Showcasing Client Purchases in Bridal Apparels and Jewelry</p>
        </div>

        <!-- Example of a client entry -->
        <div class="row client-entry">
            <div class="col-sm-7 client-info">
                <h2>Jinita Sanghvi</h2>
                <p>Description: This client purchased a bridal lehenga with jewelry set, including earrings, a necklace, and a headpiece.</p>
            </div>
            <div class="col-sm-5  media-section">
                <img src="./client/jinita.jpeg" class="client_photo" alt="Bridal Lehenga">
            </div>
        </div>
        
        
        <div class="row client-entry">
        
            <div class="col-sm-5  media-section">
                <img src="./client/jinita.jpeg" class="client_photo" alt="Bridal Lehenga">
            </div>
                <div class="col-sm-7 client-info">
                <h2>Jinita Sanghvi</h2>
                <p>Description: This client purchased a bridal lehenga with jewelry set, including earrings, a necklace, and a headpiece.</p>
            </div>
        </div>
        
        

    </div>
</body>


<?php include('footer.php'); ?>
