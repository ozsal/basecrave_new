<!DOCTYPE html>
<html>

<body>
    <img src="../background.png" alt="basecrave" class="email_image" 
        style="position: absolute; top: 0px;left: 0px;   width: 1440px;   height: 339px;   border-radius: 0px; ">
    <p class="text" style="position: absolute;   top: 374px;   left: 59px;   font-family: Inter;   
        font-size: 24px;   line-height: 36px;   color: #ED7D2DFF;">Hey There</p>
    <p class="text2" style="position: absolute; top: 428px;   left: 59px; font-family: Inter;font-size: 18px;   
        line-height: 28px; color: #171A1FFF; ">You have new reservation with following details :</p>
    <p class="text3" style="position: absolute;   top: 478px;   left: 59px;   font-family: Inter;   font-size: 16px;   
        line-height: 26px;   color: #171A1FFF;">Customer Name : {{ $name }}</p> 
    <p class="text4" style="position: absolute; top: 517px;left: 59px;font-family: Inter;font-size: 16px;   
        line-height: 26px; color: #171A1FFF;">Customer Email :  {{ $email }}</p>
    <p class="text5" style="position: absolute; top: 517px; left: 59px; font-family: Inter; font-size: 16px;   
        line-height: 26px; color: #171A1FFF;">Customer Cell No. :  {{ $phonenumber }}</p>
    <p class="text6" style="position: absolute;top: 595px;left: 59px;font-family: Inter;   
        font-size: 16px;line-height: 26px; color: #171A1FFF; ">No. of Individuals :  {{ $numberofpeople }}</p>
    <p class="text7" style="position: absolute; top: 634px;left: 59px;font-family: Inter;font-size: 16px;   
        line-height: 26px; color: #171A1FFF; ">Reserved for (Date) :  {{ $date }}</p>
    <p class="text8" style="position: absolute;text-align:center;top: 685px;left: 648px;font-family: Inter;font-size: 18px;   
        line-height: 28px;color: #171A1FFF;">Have a good day !</p>
    <p class="text9" style="position: absolute;text-align:center; top: 716px; left: 263px; font-family: Inter;font-size: 18px;   
        line-height: 28px;color: #9095A0FF;">Note: This is a system generated email. Please confirm the reservation on the basis of aforementioned details.</p>
    <img src="../basecrave_logo.png" alt="basecrave" class="email_logo" style="position: absolute;
        top: 744px;left: 1074px;width: 366px;height: 156px;border-radius: 0px;float:right">

</body>
</html>