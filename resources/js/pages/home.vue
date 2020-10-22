<template>
  <div>
    <div class="claim" v-bind:class="{'padding-top-80':!authenticated}">
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
                    黑名单
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }" v-if="!authenticated">
                      登录后查看
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    秒拨作弊
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }" v-if="!authenticated">
                      登录后查看
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    来自代理
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }" v-if="!authenticated">
                      登录后查看
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    拨号VPS
                  </div>
                  <div class="col-xs-7 time-text">
                    <router-link :to="{ name: 'login' }" v-if="!authenticated">
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
                    黑名单
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">
                      <router-link :to="{ name: 'login' }" v-if="!authenticated">
                        登录后查看
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    来自接码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">
                      <router-link :to="{ name: 'login' }" v-if="!authenticated">
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

    <div id="confirm_modal" class="modal fade results-dialog" v-bind:class="{'in':isOpened}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="confirmation-sent">
                  <div class="icon">
                    <i class="icon-garbage"></i>
                  </div>
                  <div class="title1"></div>
                  <div class="title2">
                    Are you sure you want to delete this location?
                  </div>
                  <div class="row delete-confirmation">
                    <div class="col-xs-6 no-padding-right">
                      <button type="button" class="btn btn-six btn-block" data-dismiss="modal" v-on:click="isOpened = false">NO</button>
                    </div>
                    <div class="col-xs-6 no-padding-left">
                      <button type="button" class="btn btn-three btn-block" ng-click="delete()">YES</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-backdrop fade in" v-if="isOpened"></div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Form from "vform";
import axios from "axios";

const qs = (params) => Object.keys(params).map(key => `${key}=${params[key]}`).join('&')

export default {
  layout: 'basic',

  scrollToTop: true,

  metaInfo () {
    return {
      title: '识别'
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
      console.log(e)
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
    isOpened: false,
    error: ''
  }),

  computed: {
    address: function () {
      let address = this.ipData.country
      address += this.ipData.province ? '-'+this.ipData.province : ''
      address += this.ipData.city && this.ipData.province != this.ipData.city ? '-'+this.ipData.city : ''
      address += this.ipData.district && this.ipData.city != this.ipData.district ? '-'+this.ipData.district : ''
      return address
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
      authenticated: 'auth/check',
      user: 'auth/user'
    })
  },

  methods: {
    async search() {
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

      this.$router.push({path: '/home', query: query})
    },

    toggleAdvance() {
      this.scrollToTop()
      this.advanced = !this.advanced
    },

    scrollToTop() {
      window.scrollTo(0,0)
    },
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
    padding: 40px 0 0;
  }

  .padding-top-80 {
    padding-top: 80px;
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

  .claim .claim__block {
    padding-top: 7px;
  }

  .claim .claim__block.main-block .search-block {
    position: relative;
    margin-top: 30px;
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
