import Vue from 'vue';
// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
// Init plugin
Vue.use(Loading,{
  // Pass props by their camelCased names
  container: null,//this.$refs.loadingContainer,
  canCancel: true, // default false
  onCancel: null,
  color: '#ffb400',
  loader: 'dots',
  width: 64,
  height: 64,
  backgroundColor: '#ffffff',
  opacity: 0.5,
  zIndex: 999,
},{
  // Pass slots by their names
  //default: this.$createElement('your-custom-loader-component-name'),
});

const loading = Vue.$loading

export default loading
