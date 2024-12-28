<?php

$title = $params['title'];
$description = $params['description'];
$button = $params['button'];

?>

<section class="amenities py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="pb-4">Amenities</h2>
                <div class="amenity-grid">
                    <div class="amenity p-3">
                        <i class="fa fa-wifi"></i>
                        <p>Free Wi-Fi</p>
                    </div>
                    <div class="amenity p-3">
                        <i class="fa fa-snowflake"></i>
                        <p>Air Conditioning</p>
                    </div>
                    <div class="amenity p-3">
                        <i class="fa fa-tv"></i>
                        <p>Flat-screen TV</p>
                    </div>
                    <div class="amenity p-3">
                        <i class="fa fa-utensils"></i>
                        <p>Equipped Kitchen</p>
                    </div>
                    <div class="amenity p-3">
                        <i class="fa fa-parking"></i>
                        <p>Free Parking</p>
                    </div>
                    <div class="amenity p-3">
                        <i class="fa fa-swimmer"></i>
                        <p>Close to the Beach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .amenities-boxed {
        margin: 20px 0;
    }
    .amenities-boxed h2 {
        font-size: 24px;
        color: #333;
        text-align: center;
    }
    .amenity-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        justify-items: center;
    }
    .amenity {
        text-align: center;
        background: #f0f0f0;
        border-radius: 0px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .amenity i {
        font-size: 30px;
        color: #4CAF50;
    }
    .amenity p {
        margin: 0;
        font-size: 16px;
        color: #555;
    }
    .amenity:hover {
        transform: translateY(-5px);
        background-color: #eaf8e3;
    }
</style>