<template>
  <div>
    <nav class="navbar navbar-default navbar-fixed-top navbar-home" v-if="$route.name == 'welcome'">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" v-if="!authenticated" data-toggle="collapse"
                  data-target="#bs-example-navbar-collapse-1">
            <i class="icon-header-icon1 open-icon" v-show="isCollapsed"></i>
            <i class="icon-header-icon2 close-icon" v-show="!isCollapsed"></i>
          </button>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand">
            <i class="icon-logo1" v-show="isCollapsed"></i>
            <i class="icon-logo5" v-show="!isCollapsed"></i>
          </router-link>
        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
          <ul class="nav navbar-nav navbar-right">
            <template v-if="authenticated">
              <li>
                <router-link :to="{ name: 'home' }" style="padding: 0 0;">
                  <img class="logo" :src="user.photo_url.encoded"> <span class="no-caret"></span>
                </router-link>
              </li>
            </template>
            <template v-else>
              <li>
                <router-link :to="{ name: 'login' }" class="btn btn-one">
                  登录
                </router-link>
              </li>
              <li>
                <router-link :to="{ name: 'register' }" class="btn btn-two">
                  注册
                </router-link>
              </li>
            </template>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-default navbar-main" v-bind:class="{'navbar-fixed-top':!authenticated}" v-else>
      <div class="container-fluid" v-if="authenticated">
        <div class="navbar-header business-header">
          <button type="button" class="navbar-toggle collapsed"
                  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <i class="icon-header-icon3 open-icon"></i>
            <i class="icon-header-icon2 close-icon"></i>
          </button>
          <div class="navbar-brand">
            <router-link :to="{ name: 'welcome' }">
              <i class="icon-logo5"></i>
            </router-link>
          </div>
        </div>
        <div class="tablet-menu-wrapper-outer" v-bind:class="{'shown':!isCollapsed}">
          <div class="tablet-menu-wrapper-inner">
            <div class="tablet-menu">
              <div class="row row-info">
                <div class="col-xs-2">
                  <img class="logo" src="/images/user-placeholder.png">
                </div>
                <div class="col-xs-10">
                  <div class="name">{{user.name}}</div>
                  <div class="email">{{user.phone}}</div>
                </div>
              </div>
              <div class="link-item" @click.prevent="isCollapsed = true">
                <router-link :to="{ name: 'settings.profile' }">
                  <i class="icon-header-icon5"></i>个人设置
                </router-link>
              </div>
              <div class="link-item">
                <a href=""><i class="icon-feedback"></i>反馈</a>
              </div>
              <div class="link-item">
                <a href=""><i class="icon-help"></i>帮助</a>
              </div>
              <div class="link-item" @click.prevent="logout">
                <a><i class="icon-header-icon6"></i>登出</a>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse navbar-collapse authenticated" id="bs-example-navbar-collapse-1">
          <div class="mobile-menu">
            <div class="link-item" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <router-link :to="{ name: 'settings.profile' }">
                <i class="icon-header-icon5"></i>个人设置
              </router-link>
            </div>
            <div class="link-item">
              <a class="feedback"><i class="icon-feedback"></i>反馈</a>
            </div>
            <div class="link-item">
              <a class="intercom"><i class="icon-help"></i>帮助</a>
            </div>
            <div class="link-item" @click.prevent="logout">
              <a><i class="icon-header-icon6"></i>登出</a>
            </div>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown user-dropdown is-business">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <img class="logo" :src="user.photo_url.encoded"> {{user.name}} <i
                class="icon-business-profile-iconj caret-logo"></i><span class="no-caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-info">
                  <div class="name">{{user.name}}</div>
                  <div class="email">{{user.phone}}</div>
                </li>
                <li>
                  <router-link :to="{ name: 'settings.profile' }">
                    <i class="icon-header-icon5 normal"></i><i class="icon-header-icon5-hover hover"></i>个人设置
                  </router-link>
                </li>
                <li class="line"></li>
                <li class="feedback"><a href=""><i class="icon-feedback normal"></i><i
                  class="icon-feedback-hover hover"></i>反馈</a></li>
                <li class="intercom"><a href=""><i class="icon-help normal"></i><i class="icon-help-hover hover"></i>帮助</a>
                </li>
                <li class="line"></li>
                <li><a class="logout" @click.prevent="logout"><i class="icon-header-icon6 normal"></i><i
                  class="icon-header-icon6-hover hover"></i>登出</a></li>
              </ul>
            </li>
            <li class="user-dropdown-business" v-bind:class="{'opened':!isCollapsed}"
                v-on:click="isCollapsed = !isCollapsed">
              <i class="icon-header-icon3 toggle-icon open"></i>
              <i class="icon-header-icon2 toggle-icon close-icon"></i>
            </li>
          </ul>
        </div>
      </div>
      <div class="container-fluid" v-else>
        <div class="navbar-header client-header">
          <button class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse"
                  type="button">
            <i class="icon-header-icon3 open-icon"></i>
            <i class="icon-header-icon2 close-icon"></i>
          </button>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand logo-navbar-brand">
            <i class="icon-logo5"></i>
          </router-link>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand hidden-xs">
            <i class="icon-logo5"></i>
          </router-link>
        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <router-link :to="{ name: 'login' }" class="btn btn-four first-btn">
                登录
              </router-link>
            </li>
            <li>
              <router-link :to="{ name: 'register' }" class="btn btn-five">
                注册
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="overlay_menu" v-bind:class="{'active_menu':!isCollapsed}"></div>
  </div>
</template>

<script>
  import $ from 'jquery'
  import {mapGetters} from 'vuex'
  import LocaleDropdown from './LocaleDropdown'

  export default {
    components: {
      LocaleDropdown
    },

    data: () => ({
      appName: window.config.appName,
      isCollapsed: true,
    }),

    mounted() {
      let _this = this
      $('#bs-example-navbar-collapse-1').on('show.bs.collapse', function () {
        _this.isCollapsed = false
      }).on('hidden.bs.collapse', function () {
        _this.isCollapsed = true
      })
    },

    computed: mapGetters({
      authenticated: 'auth/check',
      user: 'auth/user',
    }),

    methods: {
      async logout() {
        // Log out the user.
        await this.$store.dispatch('auth/logout')

        // Redirect to login.
        this.$router.push({name: 'login'})
      }
    }
  }
</script>

<style lang="scss" scoped>

  @media (max-width: 767px) {
    .navbar.navbar-default.navbar-main .navbar-collapse.collapse.in.authenticated .navbar-left, .navbar.navbar-default.navbar-main .navbar-collapse.collapse.show.authenticated .navbar-right {
      display: none;
    }

    .overlay_menu {
      position: fixed;
      z-index: 0;
      top: -5000px;
      right: -5000px;
      bottom: -5000px;
      left: -5000px;
      display: none;
      -webkit-animation-duration: .5s;
      animation-duration: .5s;
      -webkit-animation-fill-mode: forwards;
      animation-fill-mode: forwards;
      -webkit-animation-name: remodal-overlay-closing-keyframes;
      animation-name: remodal-overlay-closing-keyframes;
    }

    .overlay_menu.active_menu {
      position: fixed;
      z-index: 1;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      display: block;
      overflow: auto;
      background: rgba(255, 255, 255, .5);
      -webkit-overflow-scrolling: touch;
      -webkit-animation-duration: .25s;
      animation-duration: .25s;
      -webkit-animation-fill-mode: forwards;
      animation-fill-mode: forwards;
      -webkit-animation-name: remodal-overlay-opening-keyframes;
      animation-name: remodal-overlay-opening-keyframes;
    }
  }
</style>
