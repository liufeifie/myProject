<template>
  <div id="app" class="f18">
    <header v-show="header" id="header" class="pl15 pr15 flex bgcolor06">
      <div id="headerLeft" class="wp25 col03" @click="leftEven(headerLeft)" v-html="headerLeft.html">
        <b>后退</b>
      </div>
      <div id="headerCenter" class="wp50 tc col03">
        <b>{{pageTitle}}</b>
      </div>
      <div id="headerRight" class="wp25 tr col03" @click="rightEven(headerRight)" v-html="headerRight.html">>
        <b>前进</b>
      </div>
    </header>
    <main ref="main" id="main" :class="{'pt44': header, 'pb5': footer}">
      <transition name="bounce" mode="out-in">
        <!-- 不需要缓存的路由 -->
        <router-view></router-view>
      </transition>
    </main>
    <footer v-show="footer" id="footer" class="bgcolor01">
      <ul class="flex">
        <li>首页</li>
        <li>产品</li>
        <li>账户首页</li>
      </ul>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'App',
  mounted () {},
  methods: {
    leftEven (headerLeft) {
      if (typeof headerLeft.even === 'function') {
        headerLeft.even()
      }
    },
    rightEven (headerRight) {
      if (typeof headerRight.even === 'function') {
        headerRight.even()
      }
    }
  },
  computed: {
    header () {
      return this.$store.state.header
    },
    headerLeft () {
      return Object.assign({
        html: '<b>后退</b>',
        even: () => {
          this.$router.back()
        }
      }, this.$store.state.headerLeft)
    },
    headerRight () {
      return Object.assign({
        html: '<b>前进</b>',
        even: () => {
          if (this.$store.state.headerRight.html) this.$router.back()
        }
      }, this.$store.state.headerRight)
    },
    pageTitle () {
      return this.$store.state.pageTitle
    },
    footer () {
      return this.$store.state.footer
    }
  }
}
</script>

<style lang="less">
  @import "assets/css/index.less";
  @import "assets/css/theme.css";
  #app {
    position: absolute;
    height: 100%;
    top: 0;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
    width: 100%;
    max-width: 750px;
    margin: 0 auto;
    overflow: hidden;
  }
  #header{
    height: 4.4rem;
    line-height: 4.4rem;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
  }
  #main{
    overflow-y: auto;
    overflow-x: hidden;
    height: 100%;
  }
  #footer{
    height: 5rem;
    line-height: 5rem;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
  }

  .bounce-enter-active {
    animation: bounceInRight .5s;
  }

  .bounce-leave-active {
    animation: bounceOutLeft .5s;
  }

  @keyframes bounceInRight {
    from, 60%, to {
      animation-timing-function: cubic-bezier(0.215, 0.610);
    }

    from {
      opacity: 0;
      transform: translate3d(3000px, 0, 0);
    }

    60% {
      opacity: 1;
      transform: translate3d(-15px, 0, 0);
    }
    to {
      transform: none;
    }
  }
  @keyframes bounceInLeft {
    from, 60%, 75%, 90%, to {
      animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
    }

    0% {
      opacity: 0;
      transform: translate3d(-3000px, 0, 0);
    }

    60% {
      opacity: 1;
      transform: translate3d(25px, 0, 0);
    }

    75% {
      transform: translate3d(-10px, 0, 0);
    }

    90% {
      transform: translate3d(5px, 0, 0);
    }

    to {
      transform: none;
    }
  }
  @keyframes bounceOutLeft {
    20% {
      opacity: 1;
      transform: translate3d(20px, 0, 0);
    }

    to {
      opacity: 0;
      transform: translate3d(-2000px, 0, 0);
    }
  }
  @keyframes bounceOutRight {
    20% {
      opacity: 1;
      transform: translate3d(-20px, 0, 0);
    }

    to {
      opacity: 0;
      transform: translate3d(2000px, 0, 0);
    }
  }

  .bounceInRight {
    animation-name: bounceInRight;
  }
  .bounceOutLeft {
    animation-name: bounceOutLeft;
  }
</style>
