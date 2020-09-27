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
            <li class="link-item visible-xs"><a href="/"><i class="icon-home"></i>Home</a></li>
            <li>
              <router-link :to="{ name: 'login' }" class="btn btn-four first-btn">
                {{ $t('login') }}
              </router-link>
            </li>
            <li>
              <router-link :to="{ name: 'register' }" class="btn btn-five">
                {{ $t('register') }}
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="business">
      <div class="container visible-lg visible-md">
        <div class="row business-main-block">
          <div class="col-md-12">
            <div class="home-main no-margin-top" style="display: flex;justify-content: center;">
              <form class="form-inline" @submit.prevent="search" @keydown="form.onKeydown($event)" novalidate>
                <div class="form-row">
                  <div class="form-group">
                    <div class="input-wrapper"><input type="text"
                                                      class="search-input form-control not-mobile"
                                                      placeholder="请输入IP地址"
                                                      autocomplete="off" v-model="form.ip" :class="{ 'is-invalid': form.errors.has('ip') }"><input type="text"
                                                                                                                                                   class="search-input form-control mobile"
                                                                                                                                                   placeholder="Search"
                                                                                                                                                   autocomplete="off" v-model="form.ip"><i
                      class="icon-header-icon2 clear-text"
                      v-show="!!form.ip" v-on:click="form.ip = ''"></i>
                    </div>

                    <button type="submit" class="btn btn-three not-mobile">查询</button>
                    <button type="submit" class="btn btn-three mobile"><i
                      class="icon-search-white"></i></button>
                    <a class="text" href="javascript:void(0)" v-on:click="advanced = !advanced">高级查询<i v-bind:class="{'icon-footer-arrow-up': advanced, 'icon-footer-arrow-down': !advanced}"></i>
                    </a>
                  </div>
                </div>
                <div class="form-row" v-show="advanced">
                  <div class="form-group">
                    <div class="input-wrapper"><input type="text"
                                                      class="search-input form-control not-mobile"
                                                      placeholder="请输入手机号码"
                                                      autocomplete="off" v-model="form.phone" :class="{ 'is-invalid': form.errors.has('phone') }"><input type="text"
                                                                                                                                                   class="search-input form-control mobile"
                                                                                                                                                   placeholder="Search"
                                                                                                                                                   autocomplete="off" v-model="form.phone"><i
                      class="icon-header-icon2 clear-text"
                      v-show="!!form.phone" v-on:click="form.phone = ''"></i>
                    </div>
                  </div>
                </div>
                <div class="form-row" v-show="advanced">
                  <div class="form-group">
                    <div class="input-wrapper"><input type="text"
                                                      class="search-input form-control not-mobile"
                                                      placeholder="请输入银行卡号"
                                                      autocomplete="off" v-model="form.bankNum" :class="{ 'is-invalid': form.errors.has('bankNum') }"><input type="text"
                                                                                                                                                   class="search-input form-control mobile"
                                                                                                                                                   placeholder="Search"
                                                                                                                                                   autocomplete="off" v-model="form.bankNum"><i
                      class="icon-header-icon2 clear-text"
                      v-show="!!form.bankNum" v-on:click="form.bankNum = ''"></i>
                    </div>
                  </div>
                </div>
                <div class="form-row" v-show="advanced">
                  <div class="form-group">
                    <div class="input-wrapper"><input type="text"
                                                      class="search-input form-control not-mobile"
                                                      placeholder="请输入身份证号码"
                                                      autocomplete="off" v-model="form.idCard" :class="{ 'is-invalid': form.errors.has('idCard') }"><input type="text"
                                                                                                                                                   class="search-input form-control mobile"
                                                                                                                                                   placeholder="Search"
                                                                                                                                                   autocomplete="off" v-model="form.idCard"><i
                      class="icon-header-icon2 clear-text"
                      v-show="!!form.idCard" v-on:click="form.idCard = ''"></i>
                    </div>

                  </div>
                </div>
              </form>
            </div>

            <div class="info-block hours-info" v-if="ipData">
              <div class="title"><i class="icon-booking-icon3"></i>城市级信息</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.ip}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.isp}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.areacode}}</div>
                  </div>
                </div>
              </div>
              <div class="hour">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.lng + ',' + ipData.lat}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="ipData">
              <div class="title"><i class="icon-booking-icon3"></i>手机号码</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.ip}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.isp}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.areacode}}</div>
                  </div>
                </div>
              </div>
              <div class="hour">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.lng + ',' + ipData.lat}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="ipData">
              <div class="title"><i class="icon-booking-icon3"></i>身份证号码</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.ip}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.isp}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.areacode}}</div>
                  </div>
                </div>
              </div>
              <div class="hour">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.lng + ',' + ipData.lat}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="ipData">
              <div class="title"><i class="icon-booking-icon3"></i>银行卡号码</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    当前IP
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.ip}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地理位置
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    运营商
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.isp}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区代码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.areacode}}</div>
                  </div>
                </div>
              </div>
              <div class="hour">
                <div class="row">
                  <div class="col-xs-5 day-text visible-lg">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-5 day-text visible-md">
                    <div class="circle"></div>
                    地区中心经纬度
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.lng + ',' + ipData.lat}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block name-info" v-if="ipData || phoneData || idCardData || bankNumData">
              <div class="rating">
                <div ng-smooth-scroll="#reviews">
                  <div class="rating-star"><span class="rating-star-selected"></span></div>
                  <div class="rating-star"><span class="rating-star-selected"></span></div>
                  <div class="rating-star"><span class="rating-star-selected"></span></div>
                  <div class="rating-star"><span class="rating-star-selected"></span></div>
                  <div class="rating-star"><span class="rating-star-selected"></span></div>
                </div>
                <div class="review-block" ng-smooth-scroll="#reviews"><span class="reviews-count">29 Reviews</span>
                </div>
                <div class="dropdown share-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i
                  class="icon-share"></i><i class="icon-share-hover"></i></a>
                  <ul class="dropdown-menu">
                    <li><span class="share-on">SHARE ON:</span>
                      <div class="social-icon" ng-click="facebookShare()"><i
                        class="icon-business-profile-icon3 normal"></i><i
                        class="icon-business-profile-icon3-hover hover"></i></div>
                      <div class="social-icon" ng-click="twitterShare()"><i
                        class="icon-business-profile-icon4 normal"></i><i
                        class="icon-business-profile-icon4-hover hover"></i></div>
                      <div class="social-icon" ng-click="googleShare()"><i class="icon-google normal"></i><i
                        class="icon-google-hover hover"></i></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <h1 class="name">RTBAsia非人类访问量甄别服务</h1>
                </div>
              </div>
            </div>

            <div class="info-block description-info" v-if="ipData || phoneData || idCardData || bankNumData">
              <div class="title"><i class="icon-booking-icon8"></i>风险场景</div>
              <div class="" style="overflow: hidden; outline: none;"
                   tabindex="5000">
                <div class="description">
                  <p>知识背景：互联网流量可分为两类，真人流量和无效流量(IVT : Invalid
                    Traffic)。产生IVT的设备会模仿人类的形态浏览网页、观赏视频、点击广告、撰写评论、投票点赞、攫取数据、测量态势、发起攻击。IVT通常源自“数据中心”、也经常暂住在民宅中感染了恶意软件的电脑、以及被改机软件篡改的手机中，并借道代理服务器网络、以及移动数据猫池来访问互联网。</p>
                  <p>当IP场景为“数据中心”时，此IP发出的网页浏览行为大多数情况下属于NHT（Non Human
                    Traffic，非人类的访问），可能是各种功能的机器人：搜索爬虫、内容采集器、舆情监控、网站性能监控、压力测试器、自动发帖机、安全检测软件等等，你懂的...</p>
                  <p>此IP“最近执行NHT动作的时间”为部分样本，仅供参考。</p>
                  <p>“真人概率”的数值在50%以上，可以被认定为此IP的网页访问量基本由人类主动行为产生，分值愈高越真实。低于50%则有较高可能性是此IP的行为是机器人主导。</p>
                  <p>数据由RTBAsia Open Data Exchange提供，除网页查询外同时为DSP提供服务器间高频次查询接入方式，如需服务请使用您的企业邮箱联系odx@rtbasia.com</p>
                  <p>API试用申请、技术讨论、反馈建议，请加QQ群：482139657（请务必在申请加群时提一个技术问题或者具体反馈意见，否则可能会被认为是non-human而不能通过）</p>
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
import { mapGetters } from 'vuex'
import axios from 'axios'
import Form from 'vform'

const qs = (params) => Object.keys(params).map(key => `${key}=${params[key]}`).join('&')

export default {
  layout: 'basic',

  async beforeRouteEnter (to, from, next) {
    try {
      const { data } = await axios.post(`/api/risk/check?${qs(to.query)}`)

      next(vm => {
        vm.ipData = data.ipData
      })
    } catch (e) {
      next(vm => {
        vm.error = e.response.data
      })
    }
  },

  beforeRouteLeave (to, from, next) {
    document.body.className = ''
    next()
  },

  created () {
    document.body.className += ' public-page-top'
    this.form.ip = this.$route.query.ip
  },

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName,
    searchToggled: false,
    ipData: '',
    phoneData: null,
    idCardData: null,
    bankNumData: '',
    itemValue: '',
    showWrongInfoDialog: false,
    advanced: false,
    form: new Form({
      ip: '',
      phone: '',
      idCard: '',
      bankNum: ''
    }),
    error: ''
  }),

  computed: {
    address: function () {
      return this.ipData.country + '-' + this.ipData.province
    },
    gmapUrl: function () {
      return 'https://maps.google.com/maps?daddr=' + this.ipData.lng + ',' + this.ipData.lat
    },
    ...mapGetters({
      authenticated: 'auth/check'
    })
  }
}
</script>

<style lang="scss" scoped>
  .home-main {
    min-height: auto;
    //align-items: center;
  }
  .form-row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -5px;
    margin-left: -5px;
  }
  .form-group {
    margin-bottom: 1rem;
  }
  .icon-footer-arrow-up, .icon-footer-arrow-down {
    margin-left: 2px;
  }
  .business .business-main-block {
    padding: 18px 0 0;
  }
</style>
