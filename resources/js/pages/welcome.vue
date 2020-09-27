<template>
  <div>
    <nav class="navbar navbar-default navbar-fixed-top navbar-home move-to-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                  data-target="#bs-example-navbar-collapse-1" aria-expanded="false" v-on:click.capture="isCollapsed = !isCollapsed">
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
            <li>
              <router-link :to="{ name: 'login' }" class="btn btn-one">
                {{ $t('login') }}
              </router-link>
            </li>
            <li>
              <router-link :to="{ name: 'register' }" class="btn btn-two">
                {{ $t('register') }}
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="home-main">
      <div class="background-item background1" v-bind:class="{active: step == 0}">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 item"><h1>Not feeling well?<br class="hidden-md hidden-lg"> Find a top vet
            </h1></div>
          </div>
        </div>
      </div>
      <div class="background-item background2" v-bind:class="{active: step == 1}">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 item"><h1>We're better together.<br class="hidden-md hidden-lg"> Find a top
              vet</h1></div>
          </div>
        </div>
      </div>
      <div class="background-item background3" v-bind:class="{active: step == 2}">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 item"><h1>They deserve the best.<br class="hidden-md hidden-lg"> Find a top
              vet</h1></div>
          </div>
        </div>
      </div>
      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 item"><h2>TopVet lists over 20,000 trusted vets</h2>
              <h2 class="no-margin-top">Find yours today</h2></div>
          </div>
          <div class="row">
            <div class="col-xs-12 item">
              <form class="form-inline" method="get" @submit.prevent="search" @keydown="form.onKeydown($event)" novalidate>
                <div class="input-wrapper"><input type="text"
                                                  class="search-input form-control not-mobile"
                                                  placeholder="请输入IP地址"
                                                  autocomplete="off" v-model="form.itemValue" :class="{ 'is-invalid': form.errors.has('itemValue') }"><input type="text"
                                                                                                class="search-input form-control mobile"
                                                                                                placeholder="Search"
                                                                                                autocomplete="off" v-model="form.itemValue"><i
                  class="icon-header-icon2 clear-text"
                  v-show="!!form.itemValue" v-on:click="form.itemValue = ''"></i>
                  <div class="autocomplete-suggestions"
                       style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
                </div>
                <button type="submit" class="btn btn-three not-mobile">SEARCH</button>
                <button type="submit" class="btn btn-three mobile"><i
                  class="icon-search-white"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="home-popular-cities">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title">MOST</div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="subtitle">Popular Cities</div>
          </div>
        </div>
        <div class="popular-cities">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="popular-city" ng-click="openCity('/practices/united-states/new-york/new-york')">
                <div class="image"><img alt="" class="img-responsive"
                                        src="https://topvet.azureedge.net/PopularCities/united-states1.png">
                </div>
                <div class="city-block">
                  <div class="name">New York</div>
                  <div class="count">37</div>
                </div>
                <div class="view-block">VIEW <i class="icon-next-arrow"></i></div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="popular-city"
                   ng-click="openCity('/practices/united-states/california/los-angeles')">
                <div class="image"><img alt="" class="img-responsive"
                                        src="https://topvet.azureedge.net/PopularCities/united-states2.png">
                </div>
                <div class="city-block">
                  <div class="name">Los Angeles</div>
                  <div class="count">35</div>
                </div>
                <div class="view-block">VIEW <i class="icon-next-arrow"></i></div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="popular-city" ng-click="openCity('/practices/united-states/illinois/chicago')">
                <div class="image"><img alt="" class="img-responsive"
                                        src="https://topvet.azureedge.net/PopularCities/united-states3.png">
                </div>
                <div class="city-block">
                  <div class="name">Chicago</div>
                  <div class="count">63</div>
                </div>
                <div class="view-block">VIEW <i class="icon-next-arrow"></i></div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="popular-city" ng-click="openCity('/practices/united-states/texas/houston')">
                <div class="image"><img alt="" class="img-responsive"
                                        src="https://topvet.azureedge.net/PopularCities/united-states4.png">
                </div>
                <div class="city-block">
                  <div class="name">Houston</div>
                  <div class="count">102</div>
                </div>
                <div class="view-block">VIEW <i class="icon-next-arrow"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="home-get-listed-today">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title">Are you a top vet?</div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="subtitle">List your veterinary practice and grow your business online</div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center"><a href="/management-software/" class="btn btn-three">GET LISTED
            TODAY</a></div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-5 item">
            <div class="logo1"><a href="/"><i class="icon-logo5" style="display: none;"></i></a></div>
            <div class="info-block">
              <div class="text">TopVet is dedicated to providing</div>
              <div class="text">excellent veterinary software.</div>
            </div>
            <div class="copyright hidden-xs">© 2015-2020 TopVet. All rights reserved.</div>
          </div>
          <div class="col-md-2 col-sm-4 item hidden-xs"><h4>COMPANY</h4>
            <ul>
              <li><a href="/home/contact/">Contact Us</a></li>
              <li><a href="/terms-and-conditions/">Terms</a></li>
              <li><a href="/privacy/">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 item visible-xs"><h4 class="collapsed" ng-toggle-collapse=""
                                                             ng-toggle-collapse-target="#company-collapsed">
            COMPANY<i class="icon-footer-arrow-down"></i><i class="icon-footer-arrow-up"></i></h4>
            <ul id="company-collapsed" class="collapse">
              <li><a href="/home/contact/">Contact Us</a></li>
              <li><a href="/terms-and-conditions/">Terms</a></li>
              <li><a href="/privacy/">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-3 item three-item hidden-xs"><h4>CLIENTS</h4>
            <ul>
              <li><a href="/management-software/">Join Us</a></li>
              <li><a href="/login/">Login</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-3 item three-item visible-xs"><h4 class="collapsed" ng-toggle-collapse=""
                                                                        ng-toggle-collapse-target="#businesses-collapsed">
            CLIENTS<i class="icon-footer-arrow-down"></i><i class="icon-footer-arrow-up"></i></h4>
            <ul id="businesses-collapsed" class="collapse">
              <li><a href="/management-software/">Join Us</a></li>
              <li><a href="/login/">Login</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-5 item four-item hidden-xs"><h4>BROWSE BY
            COUNTRY</h4>
            <ul>
              <li><a href="/country/australia">Australia</a></li>
              <li><a href="/country/canada">Canada</a></li>
              <li><a href="/country/ireland">Ireland</a></li>
              <li><a href="/country/new-zealand">New Zealand</a></li>
              <li><a href="/country/south-africa">South Africa</a></li>
              <li><a href="/country/united-kingdom">United Kingdom</a></li>
              <li><a href="/country/united-states">United States</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-5 item four-item visible-xs"><h4
            class="collapsed" ng-toggle-collapse="" ng-toggle-collapse-target="#country-collapsed">BROWSE BY
            COUNTRY<i class="icon-footer-arrow-down"></i><i class="icon-footer-arrow-up"></i></h4>
            <ul id="country-collapsed" class="collapse">
              <li><a href="/country/australia">Australia</a></li>
              <li><a href="/country/canada">Canada</a></li>
              <li><a href="/country/ireland">Ireland</a></li>
              <li><a href="/country/new-zealand">New Zealand</a></li>
              <li><a href="/country/south-africa">South Africa</a></li>
              <li><a href="/country/united-kingdom">United Kingdom</a></li>
              <li><a href="/country/united-states">United States</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-3 item"><h4 class="built-by no-margin-bottom no-social"><a
            href="https://www.codefirst.co.uk/bespoke-software/" target="_blank">CUSTOM SOFTWARE DEVELOPMENT</a>
            BY</h4>
            <div class="logo2"><a href="https://www.codefirst.co.uk/bespoke-software" target="_blank"><i
              class="icon-logo3"></i></a></div>
          </div>
          <div class="col-xs-12 item visible-xs">
            <div class="copyright no-margin-top">© 2015-2020 TopVet. All rights reserved.</div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Form from 'vform'

export default {
  layout: 'basic',

  created () {
    let _this = this
    setInterval(function () {
      _this.step++
      _this.step = _this.step % 3
    }, 5000)

    window.addEventListener('scroll', function (e) {
      var navbars = document.getElementsByClassName('navbar')
      if (window.scrollY > 100) {
        if (navbars && navbars.length > 0 && navbars[0].className.indexOf('scrolled') === -1)
          navbars[0].className += ' scrolled'
      } else {
        if (navbars && navbars.length > 0) navbars[0].className = navbars[0].className.replace(/\b\sscrolled\b/, '')
      }
    })
  },

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName,
    isCollapsed: true,
    step: 0,
    form: new Form({
      itemValue: ''
    })
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  }),

  methods: {
    async search () {
      this.$router.push({ path: '/search', query: { ip: this.form.itemValue } })
    }
  }
}
</script>

<style scoped>

</style>
