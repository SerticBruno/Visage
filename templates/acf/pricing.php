<?php

$title = $params['title'];
$description = $params['description'];
$button = $params['button'];

?>

<section class="pricing py-4">
    <div class="container py-3">
        <?php if(!empty($title)) { ?>
            <div class="row">
                <div class="col-12 pb-4 d-flex align-items-center px-md-0">
                    <span class="span-line"></span>
                    <h2 class="pe-3"><?php echo $title ?></h2>
                </div>
            </div>
            <div class="row mb-3 button-row">
                <div class="col-6 col-md-2 px-2 px-md-0">
                    <?php if(!empty($button['label'])){ ?>
                        <div class="d-flex button-wrapper ms-auto">
                            <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        
        <div class="row">
            <div class="col-12">
            <table>
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Price per Night (€)</th>
                        <th>Availability</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>April / May</td>
                        <td>80</td>
                        <td>High</td>
                        <td><a href="#"><button class="btn-book">Book Now</button></a></td>
                    </tr>
                    <tr>
                        <td>June</td>
                        <td>100</td>
                        <td>Medium</td>
                        <td><a href="#"><button class="btn-book">Book Now</button></a></td>
                    </tr>
                    <tr>
                        <td>1. July – 15. July</td>
                        <td>120</td>
                        <td>Low</td>
                        <td><a href="#"><button class="btn-book">Book Now</button></a></td>
                    </tr>
                    <tr>
                        <td>15. JULY – 1. SEPTEMBER</td>
                        <td>200</td>
                        <td>High</td>
                        <td><a href="#"><button class="btn-book">Book Now</button></a></td>
                    </tr>
                    <tr>
                        <td>SEPTEMBER</td>
                        <td>200</td>
                        <td>High</td>
                        <td><a href="#"><button class="btn-book">Book Now</button></a></td>
                    </tr>
                    <tr>
                        <td>OCTOBER</td>
                        <td>200</td>
                        <td>High</td>
                        <td><a href="#"><button class="btn-book">Book Now</button></a></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    caption {
        font-size: 1.5em;
        margin-top: 10px;
        margin-bottom: 10px;
        font-weight: bold;
    }
    .btn-book {
        background-color: #4CAF50; /* Green background */
        color: white; /* White text */
        border: none; /* Remove border */
        padding: 8px 16px; /* Add padding */
        font-size: 14px; /* Font size */
        cursor: pointer; /* Pointer cursor on hover */
        border-radius: 0px; /* Rounded corners */
        transition: background-color 0.3s ease;
    }

    .btn-book:hover {
        background-color: #45a049; /* Darker green on hover */
    }
</style>