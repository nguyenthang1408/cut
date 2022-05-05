<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Arvo);
body {
  background-color: #cce4f0;
  width: 100vw;
  height: 50vh;
  position: relative;
  /*overflow: hidden; */}

.canvas {
  position: relative;
  width: 60vw;
  height: 15vw;
  margin: 0 auto;
  top: 0%;
  overflow: hidden; }

.loading {
  margin: 0 auto;
  position: relative;
  width: 80vw;
  height: 20px;
  top: 0%; }
  .loading h1 {
    width: 100%;
    text-align: center;
    color: #fefefe;
    font-family: 'Arvo';
    font-size: 30pt;
    height: 100%;
    letter-spacing: 6px; }

.scrolling-area {
  width: 100%;
  height: 98%;
  position: relative; }

.ground {
  width: 100%;
  height: 2%;
  z-index: 2;
  position: relative;
  background-color: #fefefe; }

.rabbit-main {
  width: 15%;
  height: 60%;
  margin: 0 auto;
  transform: translate3d(0, 0, 0) !important;
  position: relative;
  z-index: 0; }
  .rabbit-main .rabbit-body-part {
    position: absolute;
    background-color: #fefefe; }

.rabbit-main.rabbit-floor {
  top: 40%; }
  .rabbit-main.rabbit-floor .rabbit-body {
    width: 60%;
    height: 60%;
    border-radius: 100%;
    top: 35%;
    left: 10%;
    z-index: 2;
    transform: translate3d(0, 0, 0) !important; }
  .rabbit-main.rabbit-floor .rabbit-tail {
    width: 13%;
    height: 13%;
    border-radius: 100%;
    top: 80%;
    left: 9%;
    transform: translate3d(0, 0, 0) !important; }
  .rabbit-main.rabbit-floor .rabbit-foot {
    width: 31%;
    height: 17%;
    border-radius: 100%;
    top: 88%;
    left: 38%;
    position: relative !important;
    transform: translate3d(0, 0, 0) !important; }
    .rabbit-main.rabbit-floor .rabbit-foot .foot-cover {
      background-color: #cce4f0;
      height: 75%;
      width: 110%;
      top: 40%;
      position: relative !important;
      z-index: 0 !important; }
  .rabbit-main.rabbit-floor .rabbit-head {
    width: 32%;
    height: 32%;
    border-radius: 100%;
    top: 21%;
    left: 52%;
    z-index: 2 !important;
    transform: translate3d(0, 0, 0) !important; }
  .rabbit-main.rabbit-floor .rabbit-ear {
    width: 36%;
    height: 25%;
    border-radius: 100%;
    top: 0%;
    left: 0%; }
    .rabbit-main.rabbit-floor .rabbit-ear .ear-cover {
      background-color: #cce4f0;
      height: 65%;
      width: 110%;
      top: 40%;
      position: relative !important;
      z-index: 0 !important; }
  .rabbit-main.rabbit-floor .rabbit-ear-1 {
    transform: rotate(-146deg) translate3d(0, 0, 0);
    left: 38%;
    top: 8%;
    animation: ear-1-twitch;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-floor .rabbit-ear-2 {
    transform: rotate(-130deg) translate3d(0, 0, 0);
    left: 45%;
    top: 5%;
    animation: ear-2-twitch;
    animation-duration: 1s;
    animation-iteration-count: infinite; }

@keyframes ear-1-twitch {
  0% {
    transform: rotate(-146deg); }
  25% {
    transform: rotatate(-120deg); }
  50% {
    transform: rotate(-135deg); }
  75% {
    transform: rotate(-115deg); }
  90% {
    tranform: rotate(-146deg); } }

@keyframes ear-2-twitch {
  0% {
    transform: rotate(-130deg); }
  25% {
    transform: rotatate(-110deg); }
  50% {
    transform: rotate(-120deg); }
  75% {
    transform: rotate(-115deg); }
  90% {
    transform: rotate(-146deg); } }

.egg-outer.egg-1 {
  transform: rotate(-20deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite; }

.egg-outer.egg-2 {
  transform: rotate(35deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite;
  animation-delay: 1s; }

.egg-outer.egg-3 {
  transform: rotate(-15deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite;
  animation-delay: 2s; }

.egg-outer.egg-4 {
  transform: rotate(20deg);
  animation: egg-scroll linear;
  animation-duration: 4s;
  animation-iteration-count: infinite;
  animation-delay: 3s; }

.egg-outer {
  width: 5%;
  height: 30%;
  background-color: red;
  position: absolute;
  left: 110%;
  border-radius: 50%/60% 60% 40% 40%;
  top: 70%;
  overflow: hidden; }
  .egg-outer .egg-line {
    width: 120%;
    height: 20%;
    background-color: white; }
  .egg-outer .egg-line-1 {
    background-color: #f16565; }
  .egg-outer .egg-line-2 {
    background-color: #ffab61; }
  .egg-outer .egg-line-3 {
    background-color: #fffe70; }
  .egg-outer .egg-line-4 {
    background-color: #8aff70; }
  .egg-outer .egg-line-5 {
    background-color: #7072ff; }

@keyframes egg-scroll {
  0% {
    left: 110%; }
  40% {
    left: 30%; }
  60% {
    left: 0%; }
  61% {
    left: -1%; }
  65% {
    left: -10%; }
  100% {
    left: -20%; } }

.rabbit-main.rabbit-jump {
  animation: rabbit-jump;
  animation-duration: 1s;
  animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-head {
    animation: rabbit-jump-head;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-foot {
    animation: rabbit-jump-foot;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-body {
    animation: rabbit-jump-body;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-tail {
    animation: rabbit-jump-tail;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-ear-1 {
    animation: rabbit-jump-ear-1;
    animation-duration: 1s;
    animation-iteration-count: infinite; }
  .rabbit-main.rabbit-jump .rabbit-ear-2 {
    animation: rabbit-jump-ear-2;
    animation-duration: 1s;
    animation-iteration-count: infinite; }

@keyframes rabbit-jump {
  0% {
    top: 40%; }
  30% {
    top: 0%; }
  100% {
    top: 40%; } }

@keyframes rabbit-jump-foot {
  0% {
    transform: rotate(0deg);
    left: 38%;
    top: 88%; }
  10% {
    transform: rotate(30deg);
    left: 25%;
    top: 94%; }
  100% {
    transform: rotate(0deg);
    left: 38%;
    top: 88%; } }

@keyframes rabbit-jump-tail {
  0% {
    top: 80%;
    left: 9%; }
  5% {
    top: 76%;
    left: 6%; }
  10% {
    top: 73%;
    left: 4.5%; }
  15% {
    top: 68%;
    left: 3%; }
  25% {
    top: 64%;
    left: 2%; }
  40% {
    top: 68%;
    left: 3%; }
  60% {
    top: 73%;
    left: 4.5%; }
  80% {
    top: 77%;
    left: 6%; }
  100% {
    top: 80%;
    left: 9%; } }

@keyframes rabbit-jump-head {
  0% {
    top: 21%;
    left: 52%; }
  20% {
    top: 28%;
    left: 58%; }
  100% {
    top: 21%;
    left: 52%; } }

@keyframes rabbit-jump-ear-1 {
  0% {
    transform: rotate(-146deg) translate3d(0, 0, 0);
    left: 38%;
    top: 8%; }
  10% {
    transform: rotate(-150deg);
    left: 40%;
    top: 10%; }
  100% {
    transform: rotate(-146deg) translate3d(0, 0, 0);
    left: 38%;
    top: 8%; } }

@keyframes rabbit-jump-ear-2 {
  0% {
    transform: rotate(-130deg) translate3d(0, 0, 0);
    left: 45%;
    top: 5%; }
  10% {
    transform: rotate(-140deg);
    left: 43%;
    top: 7%; }
  100% {
    transform: rotate(-130deg) translate3d(0, 0, 0);
    left: 45%;
    top: 5%; } }

.dot-red {
  color: #f16565;
  font-family: 'Arvo'; }

.dot-yellow {
  color: #fffe70;
  font-family: 'Arvo'; }

.dot-green {
  color: #8aff70;
  font-family: 'Arvo'; }

  </style>
</head>
<body>
   <div class="canvas">
            <div class="scrolling-area">
                <div class="rabbit-main rabbit-floor rabbit-jump">
                    <div class="rabbit-body-part rabbit-body"></div>
                    <div class="rabbit-body-part rabbit-tail"></div>
                    <div class="rabbit-body-part rabbit-foot">
                        <div class="foot-cover"></div>
                    </div>
                    <div class="rabbit-body-part rabbit-head"></div>
                    <div class="rabbit-body-part rabbit-ear  rabbit-ear-1">
                        <div class="ear-cover"></div>
                    </div>
                    <div class="rabbit-body-part rabbit-ear  rabbit-ear-2">
                        <div class="ear-cover"></div>
                    </div>
                </div>
                <div class="egg-outer egg-1">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
                <div class="egg-outer egg-2">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
                <div class="egg-outer egg-3">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
                <div class="egg-outer egg-4">
                    <div class="egg-line egg-line-1"></div>
                    <div class="egg-line egg-line-2"></div>
                    <div class="egg-line egg-line-3"></div>
                    <div class="egg-line egg-line-4"></div>
                    <div class="egg-line egg-line-5"></div>
                </div>
            </div>
            <div class="ground">
            </div>
        </div>
        <div class="loading" id="loading">
            <h1>LOADING</h1>
        </div>
        <script type="text/javascript">
          //For adding dots to loading
window.onload = function(){
    var loading = document.getElementById("loading");
    
    function addRedDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span></h1>";
        }
        function addYellowDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span><span class='dot-yellow'>.</span></h1>";
        }
        function addGreenDot(i){
        i.innerHTML = "<h1>LOADING<span class='dot-red'>.</span><span class='dot-yellow'>.</span><span class='dot-green'>.</span></h1>";
        }
        function removeDots(i) {
        i.innerHTML = "<h1>LOADING</h1>";
        }
    
    function timedDots(i) {
    
        setTimeout(function(){
            addRedDot(i)
        }, 1000);
        setTimeout(function(){
            addYellowDot(i)
        }, 2000);
        setTimeout(function(){
            addGreenDot(i)
        }, 3000);
        setTimeout(function(){
            removeDots(i)
        }, 4000);
        
        }
    
    setInterval(function(){
        timedDots(loading)
    }, 4000);
}

        </script>
</body>
</html>