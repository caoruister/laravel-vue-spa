<template>
  <div>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top">
      <div class="container-fluid container-search-results">
        <div class="navbar-header client-header" v-bind:class="{'search-toggled': searchToggled}">
          <button class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse"
                  type="button"><i class="icon-header-icon3 open-icon"></i><i
            class="icon-header-icon2 close-icon"></i></button>
          <div class="screen-link toggle-link">
            <div><i class="icon-search" v-on:click="searchToggled = true"></i><i class="icon-header-icon2"
                                                                                 v-on:click="searchToggled = false"></i>
            </div>
          </div>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand logo-navbar-brand">
            <i class="icon-logo5"></i>
          </router-link>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand hidden-xs">
            <i class="icon-logo5"></i>
          </router-link>
        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
          <ul class="nav navbar-nav navbar-left hidden">
            <li class="no-padding-top"><input autocomplete="off"
                                              class="form-control search-input"
                                              placeholder="Search by Name or Location" type="text"
                                              v-model="itemValue"><i
              class="icon-header-icon2 clear-text"
              v-on:click="itemValue = ''" v-show="!!itemValue"></i>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="link-item visible-xs"><a href="/"><i class="icon-home"></i>首页</a></li>
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

    <div class="claim">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-no-padding">
            <div class="claim__block main-block"
                 ng-class="{'no-padding-bottom': !isBusy &amp;&amp; searchFinished &amp;&amp; items.length > 0 &amp;&amp; page < pages}">
              <form @submit.prevent="search" @keydown="form.onKeydown($event)">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="title">
                      按提示输入详细信息
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <input class="form-control hidden-xs" type="text" v-model="form.ip"
                             :class="{ 'is-invalid': form.errors.has('ip') }" placeholder="请输入IP地址">
                      <input class="form-control visible-xs" type="text" v-model="form.ip" placeholder="IP">

                      <button class="btn btn-three" style="margin-right: .5rem"
                              v-show="!advanced">查询
                      </button>
                      <button class="btn btn-filter" type="button" v-show="!advanced"
                              v-on:click="advanced = !advanced">高级查询 <i
                        v-bind:class="{'icon-footer-arrow-up': advanced, 'icon-footer-arrow-down': !advanced}"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="ip" />
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <input class="form-control hidden-xs" type="text" v-model="form.phone"
                             :class="{ 'is-invalid': form.errors.has('phone') }" placeholder="请输入手机号码">
                      <input class="form-control visible-xs ng-pristine ng-untouched ng-valid ng-empty" type="text"
                             v-model="form.phone" placeholder="手机号码">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="phone" />
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <input class="form-control hidden-xs" type="text" v-model="form.bankNum"
                             :class="{ 'is-invalid': form.errors.has('bankNum') }" placeholder="请输入银行卡号">
                      <input class="form-control visible-xs ng-pristine ng-untouched ng-valid ng-empty" type="text"
                             v-model="form.bankNum" placeholder="银行卡号">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="bankNum" />
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <input class="form-control hidden-xs" type="text" v-model="form.idCard"
                             :class="{ 'is-invalid': form.errors.has('idCard') }" placeholder="请输入身份证号码">
                      <input class="form-control visible-xs ng-pristine ng-untouched ng-valid ng-empty" type="text"
                             v-model="form.idCard" placeholder="身份证号码">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="idCard" />
                  </div>
                  <div class="col-xs-12">
                    <div class="search-block justify-content-flex-end">
                      <button class="btn btn-three" style="margin-right: .5rem">查询</button>
                      <button class="btn btn-filter" type="button"
                              v-on:click="advanced = !advanced">高级查询 <i
                        v-bind:class="{'icon-footer-arrow-up': advanced, 'icon-footer-arrow-down': !advanced}"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="business">
      <div class="container">
        <div class="row business-main-block">
          <div class="col-xs-12 col-no-padding">
            <div class="info-block hours-info" v-if="ipData">
              <div class="title"><i class="icon-booking-icon3"></i>IP</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    主机地址
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.ip}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    基础信息
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    风险提示
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.type}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="phoneData">
              <div class="title"><i class="icon-popular-hours-title icon"></i>手机号码</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    手机号码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{phoneData.phone}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    基础信息
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{phoneData.carrier}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    风险提示
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{phoneData.type}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="bankNumData">
              <div class="title"><i class="icon-business-profile-iconb icon"></i>银行卡号码</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    银行卡号
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.ip}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    银行信息
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    开户信息
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.isp}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    风险提示
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.areacode}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="idCardData">
              <div class="title"><i class="icon-booking-icon9 icon"></i>身份证号码</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    身份证号
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.ip}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    基础信息
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    风险提示
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.isp}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade send-message-dialog ng-scope in" v-bind:class="{'in': showWrongInfoDialog}"
         v-show="showWrongInfoDialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row header">
              <div class="col-xs-12">
                <div class="left-block">Report Incorrect Information</div>
                <div class="right-block" data-dismiss="modal" v-on:click="showWrongInfoDialog = false">close<i
                  class="icon-contact-us-icon5"></i></div>
              </div>
            </div><!-- ngIf: business.claimedDate == undefined -->
            <div class="row one flex-row ng-scope" ng-if="business.claimedDate == undefined">
              <div class="col-sm-7">
                <div class="to">Are you the owner?</div>
              </div>
              <div class="col-sm-5"><a class="btn btn-seven btn-block" href="/add-your-business/?id=36310"
                                       ng-href="/add-your-business/?id=36310">CLAIM AND MANAGE YOUR BUSINESS PROFILE</a>
              </div>
            </div><!-- end ngIf: business.claimedDate == undefined -->
            <form class="ng-pristine ng-valid">
              <div class="row two">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-xs-12 label-text">YOUR NAME</div>
                    <div class="col-xs-12"><input class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                  ng-class="{ 'error': name == '' &amp;&amp; sendClicked,'success': name != '' &amp;&amp; sendClicked }"
                                                  ng-form-control=""
                                                  ng-model="name"
                                                  type="text"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="row two-two">
                    <div class="col-xs-12 label-text">EMAIL</div>
                    <div class="col-xs-12"><input class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                  ng-class="{ 'error': isEmailValid() == false &amp;&amp; sendClicked,'success': isEmailValid() != false &amp;&amp; sendClicked }"
                                                  ng-form-control=""
                                                  ng-model="email"
                                                  type="text"></div>
                  </div>
                </div>
              </div>
              <div class="row three">
                <div class="col-xs-12 label-text">PHONE NUMBER</div>
                <div class="col-xs-12"><input class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                              ng-form-control=""
                                              ng-model="phone" type="text"></div>
              </div>
              <div class="row five">
                <div class="col-xs-12 label-text">WHAT IS WRONG</div>
                <div class="col-xs-12"><textarea class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                 ng-class="{ 'error': message == '' &amp;&amp; sendClicked,'success': message != '' &amp;&amp; sendClicked }"
                                                 ng-form-control=""
                                                 ng-model="message"
                                                 rows="6"></textarea></div>
              </div>
              <div class="row six">
                <div class="col-xs-12 button-col">
                  <button class="btn btn-three" ng-click="send()"
                          ng-show="!isBusy &amp;&amp; !isError &amp;&amp; !isSuccess">SEND<i class="icon-send-icon"></i>
                  </button>
                  <button class="btn btn-three loading ng-hide"
                          ng-show="isBusy &amp;&amp; !isError &amp;&amp; !isSuccess">SENDING ...
                  </button>
                  <button class="btn btn-three success ng-hide"
                          ng-show="!isBusy &amp;&amp; !isError &amp;&amp; isSuccess">SENT<i
                    class="icon-booking-icon7"></i></button>
                  <button class="btn btn-three error ng-hide"
                          ng-show="!isBusy &amp;&amp; isError &amp;&amp; !isSuccess">MESSAGE NOT SENT<i
                    class="icon-contact-us-icon5"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapGetters} from 'vuex'
  import axios from 'axios'
  import Form from 'vform'

  const qs = (params) => Object.keys(params).map(key => `${key}=${params[key]}`).join('&')

  export default {
    layout: 'basic',

    middleware: 'guest',

    async beforeRouteEnter(to, from, next) {
      try {
        const {data} = await axios.post(`/api/risk/check?${qs(to.query)}`)

        next(vm => {
          vm.ipData = data.ipData
          vm.phoneData = data.phoneData
          vm.idCardData = data.idCardData
          vm.bankNumData = data.bankNumData
        })
      } catch (e) {
        next(vm => {
          vm.error = e.response.data
        })
      }
    },

    beforeRouteLeave(to, from, next) {
      document.body.className = ''
      next()
    },

    created() {
      document.body.className += ' public-page-top'
      this.form.ip = this.$route.query.ip
      this.form.phone = this.$route.query.phone
      this.form.idCard = this.$route.query.idCard
      this.form.bankNum = this.$route.query.bankNum
    },

    metaInfo() {
      return {title: this.$t('home')}
    },

    data: () => ({
      title: window.config.appName,
      searchToggled: false,
      ipData: null,
      phoneData: null,
      idCardData: null,
      bankNumData: null,
      itemValue: null,
      showWrongInfoDialog: false,
      advanced: true,
      form: new Form({
        ip: null,
        phone: null,
        idCard: null,
        bankNum: null
      }),
      error: ''
    }),

    computed: {
      address: function () {
        return this.ipData.country + '-' + this.ipData.province + '-' + this.ipData.city
      },
      gmapUrl: function () {
        return 'https://maps.google.com/maps?daddr=' + this.ipData.lng + ',' + this.ipData.lat
      },
      ...mapGetters({
        authenticated: 'auth/check'
      })
    },

    methods: {
      async search() {
        const {data} = await this.form.post('/api/risk/check');

        this.ipData = data.ipData
        this.phoneData = data.phoneData
        this.idCardData = data.idCardData
        this.bankNumData = data.bankNumData

        this.changeQuery()
      },

      changeQuery() {
        let query = {}
        if (this.form.ip) query.ip = this.form.ip
        if (this.form.phone) query.phone = this.form.phone
        if (this.form.idCard) query.idCard = this.form.idCard
        if (this.form.bankNum) query.bankNum = this.form.bankNum

        this.$router.push({path: '/search', query: query})
      },

      async fetchData() {
        const {data} = await axios.post(`/api/risk/check?${qs(this.$route.query)}`)

        this.ipData = data.ipData
      }
    },

    watch: {
      //'$route': 'fetchData'
    },
  }
</script>

<style lang="scss" scoped>
  .icon-footer-arrow-up, .icon-footer-arrow-down {
    margin-left: 2px;
  }

  .claim {
    padding: 40px 0 0;
  }

  .justify-content-flex-end {
    justify-content: flex-end;
  }

  @media (max-width: 991px) {
    .business .container {
      width: 100%;
    }

    .business .col-no-padding {
      padding-left: 0;
      padding-right: 0;
    }

    .business .business-main-block .info-block.hours-info {
      margin-top: 18px;
    }
  }
</style>
