<template>
  <div class="claim claim-min-height">
    <div v-bind:class="{'padding-top-80':!authenticated}">
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
                      <input class="form-control visible-xs" type="text" v-model="itemValue"
                             :class="{ 'error': form.errors.has('itemValue') }" placeholder="请输入IP地址或手机号码">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="itemValue"/>
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <i class="icon-ip-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.ip"
                             :class="{ 'error': form.errors.has('ip') }" placeholder="请输入IP地址">
                      <input class="form-control background-none visible-xs" type="text" v-model="form.ip"
                             :class="{ 'error': form.errors.has('ip') }" placeholder="请输入IP地址">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="ip"/>
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <i class="icon-phone-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.phone"
                             :class="{ 'error': form.errors.has('phone') }" placeholder="请输入手机号码">
                      <input class="form-control background-none visible-xs ng-pristine ng-untouched ng-valid ng-empty"
                             type="text"
                             v-model="form.phone" placeholder="手机号码">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="phone"/>
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <i class="icon-bank-num-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.bankNum"
                             :class="{ 'error': form.errors.has('bankNum') }" placeholder="请输入银行卡号">
                      <input class="form-control background-none visible-xs ng-pristine ng-untouched ng-valid ng-empty"
                             type="text"
                             v-model="form.bankNum" placeholder="银行卡号">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="bankNum"/>
                  </div>
                </div>
                <div class="row" v-show="advanced">
                  <div class="col-xs-12">
                    <div class="search-block">
                      <i class="icon-id-card-search"></i>
                      <input class="form-control background-none hidden-xs" type="text" v-model="form.idCard"
                             :class="{ 'error': form.errors.has('idCard') }" placeholder="请输入身份证号码">
                      <input class="form-control background-none visible-xs ng-pristine ng-untouched ng-valid ng-empty"
                             type="text"
                             v-model="form.idCard" placeholder="身份证号码">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <has-error :form="form" field="idCard"/>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="search-block search-btn-group">
                      <button class="btn btn-three">查询</button>
                      <button class="btn btn-more" type="button"
                              v-on:click="toggleAdvance"><span v-show="advanced">智能模式</span><span v-show="!advanced">专家模式</span>
                        <i
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
              <div class="alert alert-danger" role="alert" v-if="error">
                {{ error }}，请充值
              </div>
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
                    <div v-else>
                      <a href="javascript:;" v-on:click="confirmQuery('isBlack')" v-if="!ipData.isBlack">查看</a>
                      <span v-else>{{ipData.isBlack.value | yesOrNo}}</span>
                    </div>
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
                    <div v-else>
                      <a href="javascript:;" v-on:click="confirmQuery('isDial')" v-if="!ipData.isDial">查看</a>
                      <span v-else>{{ipData.isDial.value | yesOrNo}}</span>
                    </div>
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
                    <template v-else>
                      <a href="javascript:;" v-on:click="confirmQuery('proxy')" v-if="!ipData.proxy">查看</a>
                      <span v-else>{{ipData.proxy.value | yesOrNo}}</span>
                    </template>
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
                    <div v-else>
                      <a href="javascript:;" v-on:click="confirmQuery('vps')" v-if="!ipData.vps">查看</a>
                      <span v-else>{{ipData.vps.value | yesOrNo}}</span>
                    </div>
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
                    <div class="time-text-row">{{phoneData.area}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    运营商
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
              <div class="hour no-padding-top no-padding-bottom hidden">
                <div class="row">
                  <div class="col-xs-5 day-text">
                  </div>
                  <div class="col-xs-7 time-text">
                    <a v-bind:href="bankNumData.weburl">
                      <img v-bind:src="bankNumData.logo" height="58px"/>
                    </a>
                  </div>
                </div>
              </div>
              <div class="hour">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    银行卡号码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{form.bankNum}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    开户信息
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{bankNumData.bank}}-{{bankNumData.type}}-{{bankNumData.card_name}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    归属地
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{bankNumData.province}}-{{bankNumData.city}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    客服电话
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{bankNumData.tel}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    Luhn校验
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{bankNumData.isLuhn | isLuhn}}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="info-block hours-info" v-if="idCardData">
              <div class="title"><i class="icon-id-card-search-result icon"></i>身份证号码</div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    身份证号码
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{form.idCard}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    性别
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{idCardData.sex | isGender}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    出生日期
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{idCardData.birthdayCode}}</div>
                  </div>
                </div>
              </div>
              <div class="hour ">
                <div class="row">
                  <div class="col-xs-5 day-text">
                    发证地
                  </div>
                  <div class="col-xs-7 time-text">
                    <div class="time-text-row">{{idCardData.address}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="confirm_modal" class="modal fade results-dialog" v-bind:class="{'in':isOpened}"
         v-bind:style="{display: isOpened ? 'block' : 'none'}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="confirmation-sent">
                  <div class="icon">⚠️</div>
                  <div class="title1">操作提示</div>
                  <div class="title2">
                    本次操作将会扣除账户1个点数
                  </div>
                  <div class="row delete-confirmation">
                    <div class="col-xs-6 no-padding-right">
                      <button type="button" class="btn btn-six btn-block" v-on:click="isOpened = false">取消</button>
                    </div>
                    <div class="col-xs-6 no-padding-left">
                      <button type="button" class="btn btn-three btn-block" v-on:click="queryRisk">确认</button>
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
  import {mapGetters} from 'vuex'
  import Form from "vform"
  import axios from "axios"

  const qs = (params) => Object.keys(params).map(key => `${key}=${params[key]}`).join('&')

  export default {
    layout: 'basic',

    scrollToTop: true,

    metaInfo() {
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
        next(vm => {
          vm.error = e.response
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
      phoneRegExp: /^1(3\d|4[14-8]|5[0-35-9]|6[567]|7[012345-8]|8\d|9[025-9])\d{8}$/,
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
      queryParam: null,
      error: ''
    }),

    computed: {
      address: function () {
        let address = this.ipData.country
        address += this.ipData.province ? '-' + this.ipData.province : ''
        address += this.ipData.city && this.ipData.province != this.ipData.city ? '-' + this.ipData.city : ''
        address += this.ipData.district && this.ipData.city != this.ipData.district ? '-' + this.ipData.district : ''
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
          if (this.ipRegExp.test(this.itemValue)) {
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
        window.scrollTo(0, 0)
      },

      confirmQuery(queryParam) {
        this.isOpened = true
        this.queryParam = queryParam
      },

      async queryRisk() {
        try {
          this.isOpened = false

          const {data} = await axios.post(`/api/risk/check/ip`, {
            ip: this.form.ip,
            q: this.queryParam
          })

          if (data.message) {
            this.error = data.message
          } else {
            this.$set(this.ipData, this.queryParam, {
              value: data[this.queryParam],
            })
          }


        } catch (e) {
          this.error = e.response.data
        }
      }
    },

    filters: {
      yesOrNo: function (value) {
        return value ? '是' : '否'
      },
      isGender: function (value) {
        return value ? '男' : '女'
      },
      isLuhn: function (value) {
        return value ? '符合银行卡Luhn算法编码' : '不符合银行卡Luhn算法编码'
      }
    }
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
    margin-left: .5rem;
  }

  .search-btn-group {
    justify-content: flex-end;
  }

  @media (max-width: 767px) {
    .search-btn-group {
      flex-direction: column;

      .btn-more {
        margin-left: 0;
        margin-top: .5rem;
      }

      .btn-more, .btn-three {
        width: 100% !important;
      }
    }

    .results-dialog .modal-dialog .modal-content .modal-body .confirmation-sent {
      padding-top: 45px;
      width: 100%;
    }

    .results-dialog .modal-dialog .modal-content {
      margin-bottom: -156px;
      bottom: 50%;
    }

    .results-dialog .modal-dialog {
      margin: 10px;
      width: auto;
    }
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

  @media (min-width: 992px) {
    .claim.claim-min-height {
      min-height: 760px;
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

  .icon-ip-search, .icon-phone-search, .icon-bank-num-search, .icon-id-card-search, .icon-ip-search-result, .icon-phone-search-result, .icon-bank-num-search-result, .icon-id-card-search-result, .icon-sheep-red, .icon-sheep-green {
    background-image: url(/images/icons2x.png?v=1581334007027);
    background-size: 168px 5180px;
  }

  .icon-ip-search {
    position: absolute;
    background-position: 0 -1264px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-phone-search {
    position: absolute;
    background-position: 0 -1152px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-bank-num-search {
    position: absolute;
    background-position: 0 -393px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-id-card-search {
    position: absolute;
    background-position: 0 -1040px;
    width: 16px;
    height: 16px;
    top: 10px;
  }

  .icon-ip-search-result {
    background-position: 0 -1600px;
    width: 16px;
    height: 16px;
  }

  .icon-phone-search-result {
    background-position: 0 -1648px;
    width: 16px;
    height: 16px;
  }

  .icon-bank-num-search-result {
    background-position: 0 -380px;
    width: 16px;
    height: 16px;
  }

  .icon-id-card-search-result {
    background-position: 0 -1536px;
    width: 16px;
    height: 16px;
  }

  .icon-sheep-red {
    background-position: 0 -1696px;
    width: 16px;
    height: 16px;
  }

  .icon-sheep-green {
    background-position: 0 -1680px;
    width: 16px;
    height: 16px;
  }

  .hours-info {
    .hour {
      .time-text {
        a {
          color: #8fa4af;
          text-decoration: none;

          &:hover {
            color: #00a7f7;
            text-decoration: none;
          }
        }
      }
    }
  }

  .results-dialog .modal-dialog .modal-content .modal-body .confirmation-sent .icon {
    font-size: 70px;
  }

  .results-dialog .modal-dialog .modal-content .modal-body .confirmation-sent .title1 {
  }
</style>
