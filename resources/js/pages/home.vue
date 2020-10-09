<template>
  <div>
    <nav class="navbar navbar-default navbar-main ng-scope">
      <div class="container-fluid ">
        <div class="navbar-header business-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <i class="icon-header-icon3 open-icon"></i>
            <i class="icon-header-icon2 close-icon"></i>
          </button>
          <div class="navbar-brand">
            <i class="icon-logo5"></i>
          </div>
        </div>
        <div class="tablet-menu-wrapper-outer">
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
              <div class="link-item feedback " onclick="_urq.push(['Feedback_Open']);">
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
        <div class="collapse navbar-collapse authenticated" id="bs-example-navbar-collapse-1">
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
                    <i class="icon-header-icon5 normal"></i><i class="icon-header-icon5-hover hover"></i>My Profile
                  </router-link>
                </li>
                <li class="feedback" onclick="_urq.push(['Feedback_Open']);"><a href=""><i class="icon-feedback normal"></i><i class="icon-feedback-hover hover"></i>反馈</a></li>
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

    <div class="add-your-business">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 no-padding-right no-padding-left">
            <div class="info-block step1-block" ng-show="wizard.step==1">
              <div class="title hidden-xs">
                Let’s put your business on the map:
              </div>
              <form class="form-business-details ng-pristine ng-valid">
                <div class="row mobile-row-one">
                  <div class="col-xs-12">
                    <div class="label-text">BUSINESS NAME</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.name" ng-class="{'error': (wizard.step1.name == '' || wizard.step1.name == undefined) &amp;&amp; wizard.step1.nextClicked}" placeholder="Name of your business (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.nameError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="label-text">ADDRESS</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.address" ng-class="{'error': (wizard.step1.address == '' || wizard.step1.address == undefined) &amp;&amp; wizard.step1.nextClicked}" placeholder="Business Address (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.addressError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="label-text">TOWN/CITY</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.town" ng-class="{'error': (wizard.step1.town == '' || wizard.step1.town == undefined || haveNonAlphanumeric(wizard.step1.town)) &amp;&amp; wizard.step1.nextClicked}" placeholder="Town/City (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.townError != ''"></div>
                  </div>
                  <div class="col-sm-6 second-col">
                    <div class="label-text">COUNTY/STATE/PROVINCE</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.county" ng-class="{'error': (wizard.step1.county == '' || wizard.step1.county == undefined || haveNonAlphanumeric(wizard.step1.county)) &amp;&amp; wizard.step1.nextClicked}" placeholder="County/State (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.countyError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="label-text">ZIP/POST CODE</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.postCode">
                  </div>
                  <div class="col-sm-6 second-col">
                    <div class="label-text">COUNTRY</div>
                  </div>
                </div>
                <div class="row buttons-row hidden-xs">
                  <div class="col-xs-12">
                    <div class="buttons">
                      <button class="btn btn-seven btn-cancel ng-hide" ng-click="cancel()" ng-show="showCancel != '-1'">CANCEL</button>
                      <button class="btn btn-three" ng-click="wizard.step1.next()">SAVE AND CONTINUE</button>
                    </div>
                  </div>
                </div>
                <div class="row buttons-row visible-xs">
                  <div class="col-xs-12">
                    <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step1.next()" ng-scroll-to-error=".form-business-details" ng-scroll-to-error-class=".error">SAVE AND CONTINUE</button>
                  </div>
                  <div class="col-xs-12 ng-hide" ng-show="showCancel != '-1'">
                    <button class="btn btn-seven btn-cancel btn-margin-top-10" ng-click="cancel()">CANCEL</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="info-block step1-block map-block">
              <div class="title">
                <i class="icon-booking-icon9"></i>我的消费点数
              </div>
              <div class="map-div">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid signup ng-hide">
        <div class="row">
          <div class="col-xs-12 no-padding-left no-padding-right">
            <div class="confirmation-sent">
              <div class="icon">
                <i class="icon-auth-icon1"></i>
              </div>
              <div class="title1">All Done!</div>
              <div class="title2">
                Your business details have been updated and are now live on TopVet.
              </div>
              <a class="btn btn-three" href="/dashboard/">OK</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="business-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 col-sm-push-6 right-block">
            <div class="feedback ">
              <i class="icon-feedback normal"></i><i class="icon-feedback-hover hover"></i> <span>Send Feedback</span>
            </div>
            <div class="help">
              <a href="mailto:jg6t4w18@incoming.intercom.io" class="intercom"><i class="icon-help normal"></i><i class="icon-help-hover hover"></i> Help</a>
            </div>
          </div>
          <div class="col-sm-6 col-sm-pull-6">
            <div class="copyright">
              © 2015-2020 TopVet. All rights reserved.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  layout: 'basic',

  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  },

  computed: mapGetters({
    user: 'auth/user'
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
