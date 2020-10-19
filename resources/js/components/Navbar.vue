<template>
  <nav class="navbar navbar-default navbar-main" v-if="authenticated">
    <div class="container-fluid ">
      <div class="navbar-header business-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <i class="icon-header-icon3 open-icon"></i>
          <i class="icon-header-icon2 close-icon"></i>
        </button>
        <div class="navbar-brand">
          <router-link :to="{ name: 'home' }">
            <i class="icon-logo5"></i>
          </router-link>
        </div>
      </div>
      <div class="tablet-menu-wrapper-outer" v-bind:class="{ 'shown': !collapsed }">
        <div class="tablet-menu-wrapper-inner">
          <div class="tablet-menu">
            <div class="row row-info">
              <div class="col-xs-2">
                <img class="logo" src="https://topvet.blob.core.windows.net/clients/user-placeholder.png">
              </div>
              <div class="col-xs-10">
                <div class="name">{{user.name}}</div>
                <div class="email">{{user.email}}</div>
              </div>
            </div>
            <div class="link-item feedback ">
              <a href=""><i class="icon-feedback"></i>Send Feedback</a>
            </div>
            <div class="link-item intercom">
              <a href=""><i class="icon-help"></i>Help</a>
            </div>
            <div class="link-item" @click.prevent="logout">
              <a><i class="icon-header-icon6"></i>Logout</a>
            </div>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse authenticated" v-bind:class="{'in' : !collapsed}" id="bs-example-navbar-collapse-1">
        <div class="mobile-menu">
          <div class="link-item intercom">
            <a href="mailto:jg6t4w18@incoming.intercom.io" class="intercom"><i class="icon-help"></i>Help</a>
          </div>
          <div class="link-item" @click.prevent="logout">
            <a><i class="icon-header-icon6"></i>Logout</a>
          </div>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown user-dropdown is-business">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <img class="logo" src="https://topvet.blob.core.windows.net/clients/user-placeholder.png"> {{user.name}} <i class="icon-business-profile-iconj caret-logo"></i><span class="no-caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-info">
                <div class="name">{{user.name}}</div>
                <div class="email">{{user.email}}</div>
              </li>
              <li>
                <router-link :to="{ name: 'settings.profile' }">
                  <i class="icon-header-icon5 normal"></i><i class="icon-header-icon5-hover hover"></i>个人设置
                </router-link>
              </li>
              <li class="line"></li>
              <li class="feedback"><a href=""><i class="icon-feedback normal"></i><i class="icon-feedback-hover hover"></i>反馈</a></li>
              <li class="intercom"><a href=""><i class="icon-help normal"></i><i class="icon-help-hover hover"></i>帮助</a></li>
              <li class="line"></li>
              <li><a class="logout" @click.prevent="logout"><i class="icon-header-icon6 normal"></i><i class="icon-header-icon6-hover hover"></i>登出</a></li>
            </ul>
          </li>
          <li class="user-dropdown-business" ng-show="!isUserNameBusy">
            <i class="icon-header-icon3 toggle-icon open"></i>
            <i class="icon-header-icon2 toggle-icon close-icon"></i>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName,
    collapsed: true,
  }),

  computed: mapGetters({
    authenticated: 'auth/check',
    user: 'auth/user',
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
