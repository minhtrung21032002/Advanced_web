<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/landing/login.css') }}">
</head>


<body>
 <!-- top navigation bar starts-->

 

 <!-- top navigation bar ends-->



<!-- logo-div starts -->

<div class="header_wrap">
    <div id="logo">
        <a href="../Landing Page/index.html"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAS0AAACnCAMAAABzYfrWAAAAkFBMVEX///8AcL8Abr4AZrsAar0AZbsAaLwAbL7o7vfD1eogf8Xc5/TC2e2xzedIispyptavyOXM3u9Ulc/2+/0WesNJjstBhccAYroAX7kAc8GVtdvw9vvn7fYAXLhmn9PR4vGhwOGBrdmdvN+70+pRk86KstttotSyzOd8qteWuN2dv+E7gcYAV7ZlmtAcfMR0oNIdpaWoAAAJcklEQVR4nO2ae2OiOhPGITdc8YIiXharUMRLXT3f/9udzCQBrNB1u91t3/fM758ihGTyZDKZhHoeQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAE8f9BOvx+zJ+L1OtNNNvPNueG9KuZlAdcaJaR97LkfHH9bHtu+PbEuVx1Pk7DddejwST9A/aMOPMBGXqZ8H02x7tbGNM/0dwv8o1rk/qtj9LieA6eoq43k4Xoj4sP7sKLNsdngVIqbqgVM8n50xeYAV1qhadRwAPGVKda00B3iwe7Q/yB5sy0ZzGWH7Lcw5kocSbGM+Ntn06rWvFhxAXDKfGmWuAHjPv7Dxv1tdJV8on9MdDg9VdWKy6ZDR4PqIUTR44GH2NNKHV1LVH0C6uV1Fo9pBYItsxePU0n2+1E9y88JufdCaNbHO130xydpQesqymMP9N43SvAt674S5dfwwU8XcME5d/M7dQ+Xp82yTS/GabJabObjqNe045hvkum42x7U+yS7PanKubaduLDeDodH5qRuBcdp0ky/e7eblErF/6vquXL185V6LV2kXi51DNaB239eMh4EARCzrU5pycp5ZNTODS/Bj+kMpXpX7rZg769OHuxWEgcPi7lcud5myU+HksRMF3drtI8mkmlbwVKbty9dCMgpMC9WWHvZa4YFzmWC3/odvpe4YN9On+perye6pIB2C9HYZda28Wvq3U3ewZQ76WU1vd4Gi2sxwa6tRjcl51t2RMsfiqGV5rNDqGKkRevalcPpp431u2K4c4VFomt5SKrcmJlHCRkorrHFkdjdl2MqRmUw+mfDJ19TJZ2EFXdw0CEHWrd6PCYWjJrVWsVgF+BFSzRK6jAS3+hJ+MR/Hdhc7mrvh3svYE0C4teOZi8Ucv1gwmrFruCXxkppJkmU/BLIYWEgQhMUgs6MyWVkGDrYqhvlaByILn2IbhIrFr+StceaG9tTBRcn7UHSihpNGpTK2X1aKo7HRy7uhB0okUtMOB4eMbamM9H2TABq4UeuzVYKE5mDOF6sfUm59EZ6xzN5+eiVqt/7WMr1/51tjdqQc2brLy66vQ0hEpk3kvTIWjEoeoIR2y4TtPtzuZuMeghjmGa9sCjcenA9sHR9uXF2IpJXgEux6I0XeeuZHsGEapKieDYpda1dvzRfcpl1PJDd+mrvHKjC2gNHjLDoidVmbAFa9xmx6rl2QyC2zXRqNXHUA7qMpyK0AQ/mMHWPseEvvhHl+Q2oJ6V4D963kTa9jWZFGpZOrVQX6+HvUJlNlLypXkb5MLK27PT9cxF+uZ6HmuqHxPpSshLi5YoETeRFWaMbQNDVOJeN5MIPN668KRdrZsMAmdiYNY9TPeh5oGsyprOST3dLw21in023MZollMr3nyPBj2rlrsZKuf0cbqe2JUBzEIX7sjl470LhrpUOojK6Vw7uA4o/nW0OQ23qTd3z1nWIpaJW8xcw3gpM+6Rcs6AXgaOG4KuMn1Lrfi1Wq5v2Ap46BFCvwux0CfxYhf31bCZUGBjogybkwHVcimxl4Bdu9vOQAm0tXOfOJlbvYKrkstgmk10TNARYFj2l3pJn5kYH8hN+06x6oemzyprDpVakZOzVHXvH1VLfH/VSoJTcmPY2YEY4OLO1Wy0yZwYuMAKuTpPy2Faa8GY60YpGiakgyy/JBhOg3/eUks3NnVL1PV2LxiWvnWs1bErwf6pWh7EW1h9YCLKyW+qNcPoHBjgGjuXKBssdF62ejGVLmyfAsHVpVeptXI9BAttQnRIAr2eBgxDfzB+VK1zcaNWevLdqll2nUHcqfXttVroUxucG67g+9VCl2ENBKjl7WWdcPEz2qqT5CojCVRxpxa2Cmqlc8xodKKixE/V2lYzcaXXBnGJJmkc6+W0KOeLhVQ2ZRQif3Am3qmVgpEKPV88/65aUICd5zVnk2KG+RXyLXNAYPKcOEt8yZVNrXqv1Yqsb8UQaxjXaUUWwdr0llrxuIryubcePu9HM6ZWq5Xv6yBwOmzTuG8dT7HhQ2rdzURvA0tWAdFeOsXfrRasObw9KqSTKB9hSrRwzcTh8DRdQeRVL25NvIlbepdxgqoDszZhlO9Wq5FB+JWAcVcGMX5ErTvf8rYwpqBDUCW371ZrH7RsOxoGh+BKOpto9mFqF9ewTmY0I4YBAv+KsjarW62wTuYfyU55cv/0Ad9Ch8BksNqSd+ZbdQ3tamFmMrcv5jATv3k9oSeDi4jGkb2dv1qJQaOxkfMtO+SYYvDIZoF22sBYdKr1yzsftfm5Wve+5RV2Z1wnwF1qnVk9bq1qpbDUcWPrWkdnttR7UPjLrcONjG/lcCJhs1hQGNza5PIY8L20j5vD1KhlJXyp5PygXfVd7HrEt7yVaaL8qVob3BAm5XjfoZa3h9DBp8V2+8Lc1gHfUpsiHBx2uK02Ox8/6GfbbVFCOajI7RMv2cGkRgLGBd9Q40HxPOdvZRDvOLGpUoButVp8y3vBfGhRJ9tdahWmQ0KsutRKsZ8BlyZnWMBs63F7j2OQx73/BQ8UhL6H+zHldj5aukCYxdOsjwWqEHD9LluxbrXedRo4efW0Sy3eVAtPBFhjm9Gllje3eabuXbtaXm/WPMsy7jqQtY1M4GFWfG6cDLMFrHmYQVyntgU/COwREHer/nzwRpT/kJPmwVJndTYgzZQQS6NWtBCCj6pSGE2K+q0JHGO6MGbPTpF0p7MmzVNhzk7L+1biPZ6T6sSUV1vXcMc5JOM6cRd7myOUvhT2RHSOY4xqzeIxN4exc5eI5Drb19aKsbfVZi1x5/PUsM82++tfMfp3cSvGXaXtqqYX393WDxpbb/PYHpHf//DC7HteZoO4Opdvqe6Q787nJG/uPNaH8rJL6k0hvFQ8b6ZJMs6sLC47DctdsikbkyQdnsrngftCkN6Z5OrL5m7L8MAXMrF5PQ0f5Vlg9vvJ3Oby72J9OnOuw8pbaoHTB0n0vs/V2ro1bqxfD9Vf5wPU0qyjzUy99WWfnfN3f9kv/PkIV6y2o8S/y8eoBfQGnd88i9/6N45S4EEI+3zX+kC1/hjm6JUtOl337/E/oBaTUjU+iX4m4ZNSnH1pteKwiLL3rqUfS5ppvoCPEwRBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARBEARB/Af5F0Xpodaw3YoOAAAAAElFTkSuQmCC" alt = "myfitness home page "/></a>
    </div>
   
        
    </div>
</div>

<!-- logo-div ends -->


<!-- header_navigation_bar starts -->
<div class="header__navigation_bar">
    <a href = "{{route('landing')}}" >ABOUT</a>

</div>
                      <!-- header_navigation_bar ends -->


<!-- ------------------------------ -- -->

        <div class="member_login">

            
            <form action="{{ route ('process_admin')}}" method ="POST" id="form">
                @csrf
                <h3 style="font-size: 16.8px; color: #333; font-weight: 300;  margin-bottom: 5px;">Admin Login</h3>

                <label for="email" style="font-weight: 300; font-size: 12px;">User Name:</label> <br>
                <input class="login_input" type="text" name="user_name" placeholder="Email Address" id="email" required><br>
                <p id="emailError"></p>
                <label for="password" style="font-weight: 300; font-size: 12px;">Password:</label><br>
                <input class="login_input" type="password" name="password" placeholder="Password" id="password" required ><br>
                <p id="passwordError">
                    @if(!empty($error_msg))
                        {{$error_msg}}
                    @endif
                </p>
                <div class="Checkbox" style="display: flex; align-items: center;">
                   
                </div>
                <button id="signup" type ="submit" >Login</button>

                <div class="underline">
                    
                </div>

            
            
                <!-- <img src="https://www.flaticon.com/svg/static/icons/svg/1384/1384053.svg" alt="" "> -->
            </form>


            
        </div>
        <div class="authentication" style="width:300px; margin: auto;">
         
        </div>

 <!-- footer starts here  -->


 <div class="footer">
    <div class="footer_upper_content">
        <a href="">Calorie Counter</a>
        <a href="">Blog</a>
        <a href="">Terms</a>
        <a href="">Privacy</a>
        <a href="">Contact Us</a>
        <a href="">API</a>
        <a href="">Jobs</a>
        <a href="">Feedback</a>
        <a href="">Community</a>
        <a href="">Guidelines</a>
        <select style="margin-left: 150px;">
            <option value="0">English</option>
            <option value="1">Dutch</option>
            <option value="2">Spanish</option>
            <option value="3">Espanol</option>
            <option value="4">Svensik</option>
        </select>
    </div>
    <div  class="footer_upper_content"><a>AdChoices</a></div>
    <div  class="footer_lower_content"><a>&copy;MyFitnessPal, INC</a></div>
    
</div>

<!-- footer ends here  -->
</body>
</html>