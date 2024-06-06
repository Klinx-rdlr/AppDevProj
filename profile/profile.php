<?php
require_once "../rent/rent.classes.php";
require_once "../rent/rentCollection.classes.php";
require_once "../rent/VideoItem.classes.php";

include_once "../home/header.php";
include_once "profile_functions.php";

$userProfile = getUserProfile();

//for debugging use only
echo "<pre>";
print_r($_SESSION['profileList'][$_SESSION['userID']]);
echo "</pre>";
?>

<div class="row p-0" style="margin: auto;">
    <div class="col-1 mr-5" style="margin-left: 70px; width: 600px">
        <?php if(getProfileStatus() == 0): ?>
        <div class="row d-flex flex-column"
            style="margin: 300px auto; width: 600px; height: 100px; background-color: white; border: 1px solid black; border-radius: 5px">
            <p class="text-center mt-2">Profile is not yet set, please set it</p>
            <button class="btn btn-block btn-primary" onClick="location.href = 'editProfile.php';"
                style="margin: 0px auto; width: 300px">Continue</button>
        </div>
        <?php else:
        $lastname = getProfileLastname();
        $middlename = getProfileMiddlename();
        $firstname = getProfileFirstname();
        $houseno = getHouseNo();
        $street = getStreet();
        $baranggay = getBaranggay();
        $city = getCity();
        $postal = getPostal();
        $phoneNumber = getProfilePhone();
        $birthday = getProfileBirthday(); ?>

        <div class="Profile card mt-5" style="width: 600px; margin: auto;">
            <div class="card-header">
                <p class="text-center" style="margin: 0px"> Profile Information </p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <p> First Name: <?php echo getProfileFirstname(); ?> </p>
                </div>
                <div class="form-group">
                    <p> Last Name: <?php echo getProfileLastname(); ?> </p>
                </div>
                <div class="form-group">
                    <p> Middle Name: <?php echo getProfileMiddlename(); ?> </p>
                </div>
                <div class="form-group">
                    <p> House No: <?php echo   getHouseNo();?> </p>
                </div>
                <div class="form-group">
                    <p> Street Name: <?php echo getStreet(); ?> </p>
                </div>
                <div class="form-group">
                    <p> Baranggay: <?php echo   getBaranggay();?> </p>
                </div>
                <div class="form-group">
                    <p> Municipality or City No: <?php echo getProfileMiddlename(); ?> </p>
                </div>
                <div class="form-group">
                    <p> Postal: <?php echo getPostal(); ?> </p>
                </div>
                <div class="form-group">
                    <p> Phone Number: <?php echo getProfilePhone(); ?> </p>
                </div>
                <div class="form-group">
                    <p> Birthday: <?php echo getProfileBirthday();  ?> </p>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-block btn-dark" onclick="location.href='editProfile.php'"> Edit Profile </button>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <div class="col-1" style="width: 900px">
        <div class="card p-0 mt-5">
            <div class="card-header p-0 mt-1">
                <p class="text-center"> Rented Videos </p>
            </div>
            <div class="card-body">
                <?php if($_SESSION['profileList'][$_SESSION['userID']]['VideosRented']->getRentList() === null): ?>
                <p class="text-center" style="color: red;"> No Videos Found </p>
                <?php else: ?>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <th> Video Title </th>
                        <th> Details </th>
                        <th> Return Date </th>
                        <th> Options </th>
                    </thead>

                    <tbody class="text-center">
                        <?php 
                        $video = $_SESSION['profileList'][$_SESSION['userID']]['VideosRented'];
                        $videoRented = $video->getRentList();
                        foreach($videoRented as $index => $video):
                        ?>
                        <tr>
                            <td class="align-middle"> <?php echo $video->get_video() ?> </td>
                            <td> <?php  
                            $item = $video->get_item();
                            ?>
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr class="">
                                            <th class="">Type</th>
                                            <th class="">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <p class="mb-0 font-weight-bold">DVD </p>
                                            </td>
                                            <td class="align-middle">
                                                <p class="mb-0"><?php echo $item->get_dvd(); ?></p>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="">
                                                <p class="mb-0 font-weight-bold">UHD </p>
                                            </td>
                                            <td class="">
                                                <p class="mb-0"><?php echo $item->get_uhd(); ?></p>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="">
                                                <p class="mb-0 font-weight-bold">Digital </p>
                                            </td>
                                            <td class="">
                                                <p class="mb-0"><?php echo $item->get_digital(); ?></p>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="">
                                                <p class="mb-0 font-weight-bold">Blu-ray </p>
                                            </td>
                                            <td class="">
                                                <p class="mb-0"><?php echo $item->get_blu_ray(); ?></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </td>
                            <td class="align-middle"> <?php echo $video->get_due_date()->format('Y-m-d'); ?> </td>
                            <td class="align-middle"> <button class="btn btn-block bg-olive"
                                    onclick="location.href='../rent/return.php?index=<?php echo $index ?>'">
                                    Return
                                </button>
                            </td>
                        </tr>


                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
            <div class=" card-footer">

            </div>
        </div>
    </div>

</div>