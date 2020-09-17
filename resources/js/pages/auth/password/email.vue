<template>
  <div class="container-fluid transparent signup">
    <div class="row">
      <div class="col-xs-12">
        <div class="signup-block" v-show="!passwordReseted">
          <div class="signup-form">
            <div class="logo">
              <router-link :to="{ name: 'welcome' }">
                <i class="icon-logo5"></i>
              </router-link>
            </div>
            <div class="title no-margin-bottom">
              To reset your password, please
            </div>
            <div class="title no-margin-top">
              provide your email.
            </div>
            <form class="form-horizontal" id="forgotForm" name="forgotForm" @submit.prevent="send" @keydown="form.onKeydown($event)" novalidate>
              <alert-success :form="form" :message="status" />

              <div class="form-group last-group">
                <div class="col-sm-12 label-text">Email</div>
                <div class="col-sm-12">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                  <has-error :form="form" field="email" />
                </div>
              </div>
              <!-- ngIf: errors.length > 0 -->
              <div class="form-group">
                <div class="col-sm-12">
                  <v-button :loading="form.busy" class="btn btn-three btn-forgot pull-right">
                    {{ $t('send_password_reset_link') }}
                  </v-button>
                </div>
              </div>
            </form>
          </div>
          <div class="sign-in hidden-xs">
            Have a flashback?
            <router-link :to="{ name: 'login' }">
              Back to Login
            </router-link>
          </div>
          <div class="sign-in visible-xs">
            <div>Have a flashback?</div>
            <div>
              <router-link :to="{ name: 'login' }">
                Back to Login
              </router-link>
            </div>
          </div>
        </div>
        <div class="confirmation-sent" v-show="passwordReseted">
          <div class="icon">
            <i class="icon-auth-icon1"></i>
          </div>
          <div class="title1">Thanks!</div>
          <div class="title2">
            A link to reset your password has been sent to your email. Please check your mailbox.
          </div>
          <router-link :to="{ name: 'login' }" class="btn btn-three">
            BACK TO LOGIN
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  middleware: 'guest',

  metaInfo () {
    return { title: this.$t('reset_password') }
  },

  data: () => ({
    status: '',
    passwordReseted: false,
    form: new Form({
      email: ''
    })
  }),

  methods: {
    async send () {
      const { data } = await this.form.post('/api/password/email')

      this.status = data.status

      this.form.reset()
    }
  }
}
</script>
