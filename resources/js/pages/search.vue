<template>
  <div>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header client-header">
          <button class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse"
                  type="button"><i class="icon-header-icon3 open-icon"></i><i
            class="icon-header-icon2 close-icon"></i></button>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand logo-navbar-brand">
            <i class="icon-logo5"></i>
          </router-link>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand hidden-xs">
            <i class="icon-logo5"></i>
          </router-link>
        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
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
            <div class="claim__block main-block">
              <form @submit.prevent="search" @keydown="form.onKeydown($event)">

                <div class="row" v-show="!advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <input class="form-control hidden-xs" type="text" v-model="itemValue"
                             :class="{ 'error': form.errors.has('itemValue') }" placeholder="请输入IP地址或手机号码">
                      <input class="form-control visible-xs" type="text" v-model="itemValue" placeholder="请输入IP地址或手机号码">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="itemValue" />
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <i class="icon-ip-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.ip"
                             :class="{ 'error': form.errors.has('ip') }" placeholder="请输入IP地址">
                      <input class="form-control background-none visible-xs" type="text" v-model="form.ip" :class="{ 'error': form.errors.has('ip') }" placeholder="请输入IP地址">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="ip" />
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <i class="icon-phone-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.phone"
                             :class="{ 'error': form.errors.has('phone') }" placeholder="请输入手机号码">
                      <input class="form-control background-none visible-xs ng-pristine ng-untouched ng-valid ng-empty" type="text"
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
                      <i class="icon-bank-num-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.bankNum"
                             :class="{ 'error': form.errors.has('bankNum') }" placeholder="请输入银行卡号">
                      <input class="form-control background-none visible-xs ng-pristine ng-untouched ng-valid ng-empty" type="text"
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
                      <i class="icon-id-card-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.idCard"
                             :class="{ 'error': form.errors.has('idCard') }" placeholder="请输入身份证号码">
                      <input class="form-control background-none visible-xs ng-pristine ng-untouched ng-valid ng-empty" type="text"
                             v-model="form.idCard" placeholder="身份证号码">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="idCard" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="search-block justify-content-flex-end">
                      <button class="btn btn-three" style="margin-right: .5rem">查询</button>
                      <button class="btn btn-more" type="button"
                              v-on:click="toggleAdvance"><span v-show="advanced">智能模式</span><span v-show="!advanced">专家模式</span> <i
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
              <div class="title"><i class="icon-ip-search-result icon"></i>IP</div>
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
                    基础信息
                    <i class="icon-sheep-red icon" v-show="ipAddressRed"></i>
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{address}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    网络类型
                    <i class="icon-sheep-red icon" v-show="ipTypeRed"></i>
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{ipData.type}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    黑名单
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }">
                      登录后查看
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    秒拨作弊
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }">
                      登录后查看
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    来自代理
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }">
                      登录后查看
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    拨号VPS
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }">
                      登录后查看
                    </router-link>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="phoneData">
              <div class="title"><i class="icon-phone-search-result icon"></i>手机号码</div>
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
                    归属地区
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{phoneData.carrier}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    卡号类型
                    <i class="icon-sheep-red icon" v-show="phoneTypeRed"></i>
                    <i class="icon-sheep-green icon" v-show="phoneTypeGreen"></i>
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{phoneData.type}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    黑名单
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">
                      <router-link :to="{ name: 'login' }">
                        登录后查看
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    <div class="circle"></div>
                    来自接码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">
                      <router-link :to="{ name: 'login' }">
                        登录后查看
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="bankNumData">
              <div class="title"><i class="icon-bank-num-search-result icon"></i>银行卡号码</div>
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
              <div class="title"><i class="icon-id-card-search-result icon"></i>身份证号码</div>
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

    metaInfo() {
      return {
        title: this.$t('search')
      }
    },

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
      next()
    },

    created() {
      this.itemValue = this.$route.query.ip || this.$route.query.phone
      this.form.ip = this.$route.query.ip
      this.form.phone = this.$route.query.phone
      this.form.idCard = this.$route.query.idCard
      this.form.bankNum = this.$route.query.bankNum
    },

    data: () => ({
      title: window.config.appName,
      ipRegExp: /^((25[0-5]|2[0-4]\d|1?\d?\d)\.){3}(25[0-5]|2[0-4]\d|1?\d?\d)$/,
      phoneRegExp: /^1(3\d|4[5-8]|5[0-35-9]|6[567]|7[012345-8]|8\d|9[025-9])\d{8}$/,
      ipData: null,
      phoneData: null,
      idCardData: null,
      bankNumData: null,
      itemValue: null,
      advanced: false,
      form: new Form({
        ip: null,
        phone: null,
        idCard: null,
        bankNum: null
      }),
    }),

    computed: {
      address: function () {
        return this.ipData.country + '-' + this.ipData.province + '-' + this.ipData.city
      },
      gmapUrl: function () {
        return 'https://maps.google.com/maps?daddr=' + this.ipData.lng + ',' + this.ipData.lat
      },
      ipTypeRed: function () {
        return this.ipData.type == '涉密专线' || this.ipData.type == '骨干网'
          || this.ipData.type == '基础设施' || this.ipData.type == '保留地址'
          || this.ipData.type == 'DNS' || this.ipData.type == 'IDC'
          || this.ipData.type == 'Anycast' || this.ipData.type == '未分配'
      },
      ipAddressRed: function () {
        return this.ipData.en && this.ipData.en != 'CN'
      },
      phoneTypeRed: function () {
        return this.phoneData.type == 'USIM数据卡'
      },
      phoneTypeGreen: function () {
        return this.phoneData.type == '虚拟运营商'
      },
      ...mapGetters({
        authenticated: 'auth/check'
      })
    },

    methods: {
      async search() {
        //智能查询处理
        if (!this.advanced) {
          if(this.ipRegExp.test(this.itemValue)){
            this.form.ip = this.itemValue
          } else if (this.phoneRegExp.test(this.itemValue)) {
            this.form.phone = this.itemValue
          } else {
            this.form.errors.set('itemValue', '请输入正确的IP地址或手机号码')
            return
          }
        }

        //非空校验
        if (!this.form.ip && !this.form.phone && !this.form.idCard && !this.form.bankNum) {
          //todo
        }

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

      toggleAdvance() {
        this.advanced = !this.advanced
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
  .btn-more {
    padding-top: 5px;
    width: 117px;
    height: 40px;
    color: #8fa4af;
    background-color: transparent;
    border: 1px solid #e5ecef;
    font-size: 12px;
  }

  @media (max-width: 767px) {
    .btn-more, .btn-three {
      width: 100% !important;
    }
  }

  .btn-more i[class^=icon-], .btn-more img {
    margin-left: 4px;
    margin-bottom: 4px
  }

  .btn-more i[class^=icon-].normal, .btn-more img.normal {
    display: inline-block
  }

  .btn-more i[class^=icon-].hover, .btn-more img.hover {
    display: none
  }

  .claim {
    padding: 80px 0 0;
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

  .claim .claim__block.main-block .search-block {
    position: relative;
  }

  .claim .claim__block.main-block .search-block .background-none {
    background: none;
  }

  .icon-ip-search {
    position: absolute;
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1264px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-phone-search {
    position: absolute;
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1152px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-bank-num-search {
    position: absolute;
    background-image: url(/images/icons.png?v=1581334007027);
    background-position: 0 -393px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-id-card-search {
    position: absolute;
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1040px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-ip-search-result {
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1600px;
    width: 16px;
    height: 16px;
  }

  .icon-phone-search-result {
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1648px;
    width: 16px;
    height: 16px;
  }

  .icon-bank-num-search-result {
    background-image: url(/images/icons.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1600px;
    width: 16px;
    height: 16px;
  }

  .icon-id-card-search-result {
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1600px;
    width: 16px;
    height: 16px;
  }

  .icon-sheep-red {
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1696px;
    width: 16px;
    height: 16px;
  }

  .icon-sheep-green {
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 241px 5180px;
    background-position: 0 -1680px;
    width: 16px;
    height: 16px;
  }
</style>
