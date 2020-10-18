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
            <div class="col-sm-12 item"><h1>全面感知灰色产业态势</h1></div>
          </div>
        </div>
      </div>
      <div class="background-item background2" v-bind:class="{active: step == 1}">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 item"><h1>识别羊毛 易如反掌</h1></div>
          </div>
        </div>
      </div>
      <div class="background-item background3" v-bind:class="{active: step == 2}">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 item"><h1>智能交叉分析算法</h1></div>
          </div>
        </div>
      </div>
      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 item">
              <h2 v-show="step == 0">机房跳板 代理拨号 接码卡池实时检测</h2>
              <h2 v-show="step == 1">无需专业知识 不改变工作流程 支持批量查询</h2>
              <h2 v-show="step == 2">既不错杀一千 也不放过一个</h2>
              <h2 class="no-margin-top hidden">Find yours today</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 item">
              <form class="form-inline" method="get" @submit.prevent="search" @keydown="form.onKeydown($event)" novalidate>
                <div class="input-wrapper"><input type="text"
                                                  class="search-input form-control not-mobile"
                                                  placeholder="请输入IP或手机号码"
                                                  autocomplete="off" v-model="form.itemValue" :class="{ 'error': form.errors.has('itemValue') }"><input type="text"
                                                                                                class="search-input form-control mobile"
                                                                                                placeholder="请输入IP或手机号码"
                                                                                                autocomplete="off" v-model="form.itemValue" :class="{ 'error': form.errors.has('itemValue') }"><i
                  class="icon-header-icon2 clear-text"
                  v-show="!!form.itemValue" v-on:click="clearInput"></i>
                  <div class="autocomplete-suggestions"
                       style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
                </div>
                <button type="submit" class="btn btn-three not-mobile">查询</button>
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
            <div class="subtitle">精准识别</div>
          </div>
        </div>
        <div class="popular-cities">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="popular-city">
                <div class="city-block">
                  <div class="name">300W<small>+</small></div>
                  <div class="count">代理/秒拨</div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="popular-city">
                <div class="city-block">
                  <div class="name">800,000<small>+</small></div>
                  <div class="count">接码手机号</div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="popular-city">
                <div class="city-block">
                  <div class="name">300,000<small>+</small></div>
                  <div class="count">羊毛党黑名单</div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="popular-city">
                <div class="city-block">
                  <div class="name">1000W<small>+</small></div>
                  <div class="count">物联网/虚商号</div>
                </div>
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
            <div class="title">企业级风险识别全新上线</div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="subtitle">API接口/离线识别包/个性化定制</div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center">
            <router-link :to="{ name: 'register' }" class="btn btn-three">
              立即注册
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-5 item">
            <div class="logo1"><a href="/"><i class="icon-logo5" style="display: none;"></i></a></div>
            <div class="info-block">
              <div class="text">关注灰色产业动态</div>
              <div class="text">收益流失管控专家</div>
            </div>
            <div class="copyright hidden-xs">© 2020 太乙风控 保留所有权利<p style="margin-top: 1rem">上海晓易信息技术有限公司</p><p style="margin-top: 1rem">沪ICP备15006156号-1</p></div>
          </div>
          <div class="col-md-2 col-sm-4 item hidden-xs"><h4>公司</h4>
            <ul>
              <li><a href="/home/contact/">联系我们</a></li>
              <li><a href="/terms-and-conditions/">服务条款</a></li>
              <li><a href="/privacy/">隐私保护</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-4 item visible-xs"><h4 class="collapsed" ng-toggle-collapse=""
                                                             ng-toggle-collapse-target="#company-collapsed">
            公司<i class="icon-footer-arrow-down"></i><i class="icon-footer-arrow-up"></i></h4>
            <ul id="company-collapsed" class="collapse">
              <li><a href="/home/contact/">联系我们</a></li>
              <li><a href="/terms-and-conditions/">服务条款</a></li>
              <li><a href="/privacy/">隐私保护</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-3 item three-item hidden-xs"><h4>企业服务</h4>
            <ul>
              <li><a href="/management-software/">API</a></li>
              <li><a href="/login/">离线包购买</a></li>
              <li><a href="/login/">投放检测</a></li>
              <li><a href="/login/">更多...</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-3 item three-item visible-xs"><h4 class="collapsed" ng-toggle-collapse=""
                                                                        ng-toggle-collapse-target="#businesses-collapsed">
            企业服务<i class="icon-footer-arrow-down"></i><i class="icon-footer-arrow-up"></i></h4>
            <ul id="businesses-collapsed" class="collapse">
              <li><a href="/management-software/">API</a></li>
              <li><a href="/login/">离线包购买</a></li>
              <li><a href="/login/">投放检测</a></li>
              <li><a href="/login/">更多...</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-5 item four-item hidden-xs"><h4>业务能力</h4>
            <ul>
              <li><a href="/country/australia">手机风险识别</a></li>
              <li><a href="/country/canada">IP风险识别</a></li>
              <li><a href="/country/ireland">金融卡风险</a></li>
              <li><a href="/country/new-zealand">社交账号风险</a></li>
              <li><a href="/country/south-africa">更多...</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-5 item four-item visible-xs"><h4
            class="collapsed" ng-toggle-collapse="" ng-toggle-collapse-target="#country-collapsed">业务能力<i class="icon-footer-arrow-down"></i><i class="icon-footer-arrow-up"></i></h4>
            <ul id="country-collapsed" class="collapse">
              <li><a href="/country/australia">手机风险识别</a></li>
              <li><a href="/country/canada">IP风险识别</a></li>
              <li><a href="/country/ireland">金融卡风险</a></li>
              <li><a href="/country/new-zealand">社交账号风险</a></li>
              <li><a href="/country/south-africa">更多...</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-sm-3 item"><h4 class="built-by no-margin-bottom no-social"><a
            href="https://www.codefirst.co.uk/bespoke-software/" target="_blank"></a>
            基础平台支持及数据合作伙伴</h4>
            <div class="logo2">
              <a href="https://www.codefirst.co.uk/bespoke-software" target="_blank"><i
              class="icon-logo3"></i></a>
            </div>
          </div>
          <div class="col-xs-12 item visible-xs">
            <div class="copyright no-margin-top">© 2020 太乙风控 保留所有权利<p style="margin-top: 1rem">上海晓易信息技术有限公司</p><p style="margin-top: 1rem">沪ICP备15006156号-1</p></div>
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
    ipRegExp: /^((25[0-5]|2[0-4]\d|1?\d?\d)\.){3}(25[0-5]|2[0-4]\d|1?\d?\d)$/,
    phoneRegExp: /^1(3\d|4[5-8]|5[0-35-9]|6[567]|7[01345-8]|8\d|9[025-9])\d{8}$/,
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
    search () {
      if(this.ipRegExp.test(this.form.itemValue)){
        this.$router.push({ path: '/search', query: { ip: this.form.itemValue } })
      } else if (this.phoneRegExp.test(this.form.itemValue)) {
        this.$router.push({ path: '/search', query: { phone: this.form.itemValue } })
      } else {
        this.form.errors.set('itemValue', '请输入正确的IP地址或手机号码')
      }
    },

    clearInput () {
      this.form.reset()
      this.form.errors.clear()
    },
  }
}
</script>

<style scoped>
  .home-main h1 {
    font-weight: 100;
  }
  .home-main h2 {
    font-weight: 100;
  }
  .home-popular-cities {
    padding-top: 0;
    padding-bottom: 0;
  }
  .home-popular-cities .popular-cities .popular-city .view-block {
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    background-color: #fff;
    color: #ffb400;
  }
  .home-popular-cities .subtitle {
    font-weight: 100;
  }
  .home-popular-cities .popular-cities {
    margin-top: 0;
  }
  .home-popular-cities .popular-cities .popular-city:hover {
  }
  .home-popular-cities .popular-cities .popular-city .city-block {
    box-shadow: none;
  }
  .home-popular-cities .popular-cities .popular-city .city-block .name {
    font-size: 52px;
    font-weight: 200;
    color: #ffb400;
  }
  .home-popular-cities .popular-cities .popular-city .city-block .count {
    color: #000;
    font-weight: 100;
  }
  .home-popular-cities .popular-cities .popular-city .view-block {
  }
</style>
