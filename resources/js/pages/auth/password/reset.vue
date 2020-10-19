<template>
  <div class="container-fluid transparent signup">
    <div class="row">
      <div class="col-xs-12">
        <div class="signup-block">
          <div class="signup-form">
            <div class="logo">
              <router-link :to="{ name: 'welcome' }">
                <i class="icon-logo5"></i>
              </router-link>
            </div>
            <div class="title no-margin-bottom">
            </div>
            <form class="form-horizontal" id="resetForm" name="resetForm" @submit.prevent="reset" @keydown="form.onKeydown($event)">
              <alert-success :form="form" :message="status" v-if="status"/>

              <div class="form-group">
                <div class="col-sm-12 label-text">手机号码</div>
                <div class="col-sm-12">
                  <input v-model="form.phone" :class="{ 'error': form.errors.has('phone') }" class="form-control" type="text" name="phone">
                  <has-error :form="form" field="phone" />
                </div>
              </div>
              <div class="form-group last-group">
                <div class="col-sm-12 label-text">密码</div>
                <div class="col-sm-12 hover">
                  <input v-model="form.password" :class="{ 'error': form.errors.has('password') }" class="form-control" type="password" name="password">
                  <has-error :form="form" field="password" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 label-text">图形验证码</div>
                <div class="col-sm-12 get-code-wrapper">
                  <input v-model="form.captcha_code" :class="{ 'error': form.errors.has('captcha_code') }" class="form-control" type="text" name="captcha_code">
                  <a class="get-code" v-on:click="getCaptchaImg"><img :src="captcha_img" title="点击更换验证码" alt="图片验证码"></a>
                  <has-error :form="form" field="captcha_code" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 label-text">短信验证码</div>
                <div class="col-sm-12 get-code-wrapper">
                  <input v-model="form.verification_code" :class="{ 'error': form.errors.has('verification_code') }" class="form-control" type="text" name="verification_code">
                  <a v-if="!sec" v-on:click="getCode" class="get-code">获取验证码</a>
                  <a v-if="sec" class="get-code" disabled="true">重新获取 ({{sec}}s)</a>
                  <has-error :form="form" field="verification_code" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <button :loading="form.busy" class="btn btn-three btn-forgot pull-right">
                    重置密码
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="sign-in hidden-xs">
            <router-link :to="{ name: 'login' }">
              返回登录
            </router-link>
          </div>
          <div class="sign-in visible-xs">
            <div></div>
            <div>
              <router-link :to="{ name: 'login' }">
                返回登录
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import Form from 'vform'
    import axios from 'axios'

    export default {
        middleware: 'guest',

        metaInfo() {
            return {title: this.$t('reset_password')}
        },

        data: () => ({
            status: '',
            form: new Form({
                phone: '',
                password: '',
                verification_key: '',
                verification_code: '',
                captcha_key: '',
                captcha_code: ''
            }),
            sec: 0,
            expired_at: '',
            captcha_img: '',
        }),

        created() {
            this.getCaptchaImg()
        },

        methods: {
            async reset() {
                const {data} = await this.form.post('/api/password/reset')

                this.status = data.status

                this.form.reset()
            },

            async getCaptchaImg () {
                const { data } = await axios.post(`/api/captchas`)

                this.form.captcha_key = data.captcha_key
                this.form.captcha_code = ''
                this.captcha_img = data.captcha_img
            },

            async getCode () {
                let _this = this
                await this.form.post('/api/reset/verificationCodes').then(({ data }) => {
                    _this.sec = 100
                    _this.form.verification_key = data.key
                    _this.expired_at = data.expired_at

                    let interval = setInterval(function () {
                        _this.sec--
                        if (_this.sec === 0) {
                            clearInterval(interval)
                        }
                    }, 1000)
                }).catch(error => {
                    _this.getCaptchaImg()
                })
            }
        }
    }
</script>
<style lang="scss" scoped>
  .get-code {
    position: absolute;
    text-decoration: none;
    cursor: pointer;
    height: 52px;
    line-height: 52px;
    top: 0;
    right: 30px;
    color: #00a7f7;
  }
</style>
