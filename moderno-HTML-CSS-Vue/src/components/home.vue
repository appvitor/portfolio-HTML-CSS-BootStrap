<template>
    <div class="home">
        <div class="designLab colorWhite imagemBg flexCenter">
            <div class="mainWidth">
                <i class="fas fa-jedi fa-2x"></i>
                <h1 class="mt">WORKING <br> WITH DESIGN LAB</h1>
                <p class="smMt">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
        </div>
        <div class="whatWeDo flexCenter mt mb">
            <div class="mainWidth">
                <h2 class="mb">WHAT WE DO</h2>
                <div class="mt mb">
                    <i class="fas fa-pen-nib fa-2x"></i>
                    <h3>DESIGN</h3>
                    <p class="smMt colorGrey">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                </div>
                <div class="mt mb">
                    <i class="fas fa-laptop-code fa-2x"></i>
                    <h3>DEVELOPMENT</h3>
                    <p class="smMt colorGrey">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.
                    </p>
                </div>
                <div class="mt mb">
                    <i class="far fa-calendar-check fa-2x"></i>
                    <h3>PRODUCT MANAGEMENT</h3>
                    <p class="smMt colorGrey">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                </div>
            </div>
        </div>
        <div class="services colorWhite imagemBg flexCenter">
            <div class="mainWidth">
                <h2>SERVICES</h2>
                <p class="mt">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. <br> Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="contactUs flexCenter mt mb">
            <div class="mainWidth">            
                <h2>CONTACT US</h2>
                <p class="mt colorGrey">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
                <router-link to='contact' class="smMt smMb">CONTACT US</router-link>
            </div>
        </div>
        <div class="tradeMark flexCenter">
            <i class="fas fa-jedi mr"></i>
            <p class="colorGrey">&copy 2019, All Rights Reserved </p>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'home',
        data () {
            return {
                title: 'Home'
            }
        }
    }
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .home {
        text-align: center;
    }
    .designLab {
        height: 97vh;
        background-image: url("../assets/bg1.jpg");
    }
    .fa-pen-nib {
        transform: rotate(135deg);
    }
    .services {
        height: 70vh;
        background-image: url("../assets/bg2.jpg");
    }
    .tradeMark {
        flex-direction: row;
    }
</style>