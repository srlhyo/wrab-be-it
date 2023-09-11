<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>
<body>
    <div class="footer-dark">
        <div class="overlap-wrapper">
            <div class="overlap">
                <div class="footer-UI">
                    <div class="sitemap">
                        <div class="flexcontainer">
                            <p class="text">
                                <span class="text-wrapper">Home<br /></span>
                            </p>
                            <p class="text">
                                <span class="text-wrapper">Abouts<br /></span>
                            </p>
                            <p class="text">
                                <span class="text-wrapper">Services<br /></span>
                            </p>
                            <p class="text">
                                <span class="text-wrapper">Merchants<br /></span>
                            </p>
                            <p class="text"><span class="text-wrapper">Contact</span></p>
                        </div>
                        <div class="div">Sitemap</div>
                    </div>
                    <!-- This section contains links to social media profiles -->
                    <div class="socials">
                        <div class="flexcontainer-2">
                            <p class="span-wrapper">
                                <span class="span">Facebook<br /></span>
                            </p>
                            <p class="span-wrapper">
                                <span class="span">Linkedin<br /></span>
                            </p>
                            <p class="span-wrapper">
                                <span class="span">Instagram<br /></span>
                            </p>
                            <p class="span-wrapper"><span class="span">Twitter</span></p>
                        </div>
                        <div class="text-wrapper-2">Socials</div>
                    </div>
                    <!-- This section contains the company's address -->
                    <div class="head-office">
                        <p class="p">Xilliams Corner Wine © 2017. 1112 A Market St # Ste B22, Charlottesville, CA 45565</p>
                        <div class="text-wrapper-2">Head Office</div>
                    </div>
                    <p class="text-wrapper-3">© 2020 Lift Media. All rights reserved.</p>
                    <!-- This section contains contact information -->
                    <div class="mail-contact">
                        <div class="text-wrapper-4">contact@lift.agency</div>
                        <img class="line" src="img/image.svg" />
                        <div class="text-wrapper-5">(123) 456-7890</div>
                        <img class="img" src="img/line-15.svg" />
                    </div>
                </div>
                <!-- This section contains an up-arrow icon -->
                <div class="up-arrow">
                    <div class="overlap-group">
                        <div class="ellipse"></div>
                        <img class="arrow-left" src="img/arrow-left-1.svg" />
                    </div>
                </div>
                <!-- This section contains a company logo -->
                <img class="dif-logo" src="img/dif-logo.svg" />
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
           
           <style>
    /* Styling for the entire footer section */
    .footer-dark {
        background-color: #ffffff;
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: 100%;
    }

    /* Styling for the outermost container of the footer */
    .footer-dark .overlap-wrapper {
        background-color: #ffffff;
        width: 1440px;
        height: 562px;
    }

    /* Styling for the main content area within the footer */
    .footer-dark .overlap {
        position: relative;
        height: 562px;
        background-color: #cb245b;
    }

    /* Styling for the content inside the footer */
    .footer-dark .footer-UI {
        position: absolute;
        width: 1047px;
        height: 362px;
        top: 100px;
        left: 182px;
    }

    /* Styling for the sitemap section within the footer */
    .footer-dark .sitemap {
        position: absolute;
        width: 81px;
        height: 218px;
        top: 0;
        left: 291px;
    }

    /* Styling for the navigation links within the sitemap */
    .footer-dark .flexcontainer {
        width: 76px;
        height: 170px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
        position: absolute;
        top: 48px;
        left: 1px;
    }

    /* Styling for individual navigation link text */
    .footer-dark .text {
        position: relative;
        align-self: stretch;
        opacity: 0.75;
        font-family: "Poppins-Medium", Helvetica;
        font-weight: 500;
        color: #ffffff;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 22px;
    }
/* Styling for the social media links section within the footer */
.footer-dark .socials {
    position: absolute;
    width: 78px;
    height: 181px;
    top: 0;
    left: 521px;
}

/* Styling for the container of social media links */
.footer-dark .flexcontainer-2 {
    width: 73px;
    height: 133px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 15px;
    position: absolute;
    top: 48px;
    left: 1px;
}

/* Styling for individual social media link text */
.footer-dark .span-wrapper {
    position: relative;
    align-self: stretch;
    opacity: 0.75;
    font-family: var(--body-font-family);
    font-weight: var(--body-font-weight);
    color: var(--white);
    font-size: var(--body-font-size);
    letter-spacing: var(--body-letter-spacing);
    line-height: var(--body-line-height);
    font-style: var(--body-font-style);
}

/* Styling for the sitemap label or heading */
.footer-dark .div {
    position: absolute;
    top: 0;
    left: 0;
    font-family: "Poppins-Regular", Helvetica;
    font-weight: 400;
    color: #ffffff;
    font-size: 16px;
    letter-spacing: 0;
    line-height: 28px;
    white-space: nowrap;
}

/* Styling for the head office section within the footer */
.footer-dark .head-office {
    position: absolute;
    width: 306px;
    height: 110px;
    top: 108px;
    left: 743px;
}

/* Styling for the company's address text */
.footer-dark .p {
    position: absolute;
    width: 302px;
    top: 48px;
    left: 0;
    opacity: 0.75;
    font-family: var(--body-font-family);
    font-weight: var(--body-font-weight);
    color: var(--white);
    font-size: var(--body-font-size);
    letter-spacing: var(--body-letter-spacing);
    line-height: var(--body-line-height);
    font-style: var(--body-font-style);
}

/* Styling for the copyright notice at the bottom of the footer */
.footer-dark .text-wrapper-3 {
    position: absolute;
    top: 342px;
    left: 749px;
    opacity: 0.6;
    font-family: var(--description-font-family);
    font-weight: var(--description-font-weight);
    color: var(--white);
    font-size: var(--description-font-size);
    letter-spacing: var(--description-letter-spacing);
    line-height: var(--description-line-height);
    white-space: nowrap;
    font-style: var(--description-font-style);
}

/* Styling for the contact information section within the footer */
.footer-dark .mail-contact {
    position: absolute;
    width: 556px;
    height: 34px;
    top: 328px;
    left: 0;
}

/* Styling for the email address text */
.footer-dark .text-wrapper-4 {
    position: absolute;
    top: 0;
    left: 0;
    font-family: "Poppins-Light", Helvetica;
    font-weight: 300;
    color: var(--white);
    font-size: 18px;
    text-align: justify;
    letter-spacing: 0;
    line-height: 24px;
    white-space: nowrap;
}

/* Styling for the horizontal line separator */
.footer-dark .line {
    position: absolute;
    width: 154px;
    height: 1px;
    top: 33px;
    left: 1px;
    object-fit: cover;
}

/* Styling for the phone number text */
.footer-dark .text-wrapper-5 {
    position: absolute;
    top: 0;
    left: 419px;
    font-family: "Poppins-Light", Helvetica;
    font-weight: 300;
    color: var(--white);
    font-size: 18px;
    text-align: justify;
    letter-spacing: 0;
    line-height: 24px;
    white-space: nowrap;
}

/* Styling for the up-arrow section within the footer */
.footer-dark .up-arrow {
    position: absolute;
    width: 52px;
    height: 52px;
    top: 76px;
    left: 1207px;
}

/* Styling for the up-arrow's container */
.footer-dark .overlap-group {
    position: relative;
    height: 52px;
    border-radius: 26px;
}

/* Styling for the circular background of the up-arrow */
.footer-dark .ellipse {
    position: absolute;
    width: 52px;
    height: 52px;
    top: 0;
    left: 0;
    background-color: #ffffff;
    border-radius: 26px;
    transform: rotate(90deg);
}

/* Styling for the up-arrow icon */
.footer-dark .arrow-left {
    position: absolute;
    width: 24px;
    height: 24px;
    top: 14px;
    left: 14px;
}

/* Styling for the company logo within the footer */
.footer-dark .dif-logo {
    position: absolute;
    width: 100px;
    height: 92px;
    top: 114px;
    left: 183px;
}
</style>

    </head>
    
</html>
