<template>
  <div>
    <nav class="navbar navbar-default navbar-main ng-scope">
      <div class="container-fluid ">
        <div class="navbar-header business-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <i class="icon-header-icon3 open-icon"></i>
            <i class="icon-header-icon2 close-icon"></i>
          </button>
          <div class="navbar-brand">
            <i class="icon-logo5"></i>
          </div>
        </div>
        <div class="tablet-menu-wrapper-outer">
          <div class="tablet-menu-wrapper-inner">
            <div class="tablet-menu">
              <div class="row row-info">
                <div class="col-xs-2">
                  <img class="logo" src="https://topvet.blob.core.windows.net/clients/user-placeholder.png">
                </div>
                <div class="col-xs-10">
                  <div class="name">{{user.name}}</div>
                  <div class="email">{{user.email}}</div>
                </div>
              </div>
              <div class="link-item feedback " onclick="_urq.push(['Feedback_Open']);">
                <a href=""><i class="icon-feedback"></i>Send Feedback</a>
              </div>
              <div class="link-item intercom">
                <a href=""><i class="icon-help"></i>Help</a>
              </div>
              <div class="link-item" @click.prevent="logout">
                <a><i class="icon-header-icon6"></i>Logout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse navbar-collapse authenticated" id="bs-example-navbar-collapse-1">
          <div class="mobile-menu">
            <div class="link-item intercom">
              <a href="mailto:jg6t4w18@incoming.intercom.io" class="intercom"><i class="icon-help"></i>Help</a>
            </div>
            <div class="link-item" @click.prevent="logout">
              <a><i class="icon-header-icon6"></i>Logout</a>
            </div>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown user-dropdown is-business">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <img class="logo" src="https://topvet.blob.core.windows.net/clients/user-placeholder.png"> victor <i class="icon-business-profile-iconj caret-logo"></i><span class="no-caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-info">
                  <div class="name">{{user.name}}</div>
                  <div class="email">{{user.email}}</div>
                </li>
                <li class="feedback" onclick="_urq.push(['Feedback_Open']);"><a href=""><i class="icon-feedback normal"></i><i class="icon-feedback-hover hover"></i>Send Feedback</a></li>
                <li class="intercom"><a href=""><i class="icon-help normal"></i><i class="icon-help-hover hover"></i>Help</a></li>
                <li class="line"></li>
                <li><a class="logout" @click.prevent="logout"><i class="icon-header-icon6 normal"></i><i class="icon-header-icon6-hover hover"></i>Logout</a></li>
              </ul>
            </li>
            <li class="user-dropdown-business" ng-show="!isUserNameBusy">
              <i class="icon-header-icon3 toggle-icon open"></i>
              <i class="icon-header-icon2 toggle-icon close-icon"></i>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="add-your-business ng-scope" ng-controller="Add.Your.Business" ng-init="businessId='18542'; userCountry=''; addYourBusinessStep='1'; showCancel='-1'; servicesEnabled=1">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 no-padding-right no-padding-left">
            <div class="info-block step1-block" ng-show="wizard.step==1">
              <div class="row one">
                <div class="col-sm-12 col-step-block">
                  <div class="step-block current" ng-class="{'current':wizard.step == 1}">
                    <div class="step current" ng-class="{'current':wizard.step == 1, 'complete': wizard.step > 1}">
                      <div class="step-number">
                        1
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text current" ng-class="{'current':wizard.step == 1}">
                      Business Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 2}">
                    <div class="step" ng-class="{'current':wizard.step == 2, 'complete': wizard.step > 2}">
                      <div class="step-number">
                        2
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 2}">
                      Contact Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 3}">
                    <div class="step" ng-class="{'current':wizard.step == 3, 'complete': wizard.step > 3}">
                      <div class="step-number">
                        3
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 3}">
                      Opening Hours
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 4}">
                    <div class="step" ng-class="{'current':wizard.step == 4, 'complete': wizard.step > 4}">
                      <div class="step-number">
                        4
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 4}">
                      Photo Gallery
                    </div>
                  </div>
                  <!-- ngIf: servicesEnabled == 1 --><div ng-if="servicesEnabled == 1" class="step-block ng-scope" ng-class="{'current':wizard.step == 5}">
                  <div class="step" ng-class="{'current':wizard.step == 5, 'complete': wizard.step > 5}">
                    <div class="step-number">
                      5
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text" ng-class="{'current':wizard.step == 5}">
                    Services
                  </div>
                </div><!-- end ngIf: servicesEnabled == 1 -->
                </div>
              </div>
              <div class="title hidden-xs">
                Let’s put your business on the map:
              </div>
              <form class="form-business-details ng-pristine ng-valid">
                <div class="row mobile-row-one">
                  <div class="col-xs-12">
                    <div class="label-text">BUSINESS NAME</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.name" ng-class="{'error': (wizard.step1.name == '' || wizard.step1.name == undefined) &amp;&amp; wizard.step1.nextClicked}" placeholder="Name of your business (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.nameError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="label-text">ADDRESS</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.address" ng-class="{'error': (wizard.step1.address == '' || wizard.step1.address == undefined) &amp;&amp; wizard.step1.nextClicked}" placeholder="Business Address (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.addressError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="label-text">TOWN/CITY</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.town" ng-class="{'error': (wizard.step1.town == '' || wizard.step1.town == undefined || haveNonAlphanumeric(wizard.step1.town)) &amp;&amp; wizard.step1.nextClicked}" placeholder="Town/City (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.townError != ''"></div>
                  </div>
                  <div class="col-sm-6 second-col">
                    <div class="label-text">COUNTY/STATE/PROVINCE</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.county" ng-class="{'error': (wizard.step1.county == '' || wizard.step1.county == undefined || haveNonAlphanumeric(wizard.step1.county)) &amp;&amp; wizard.step1.nextClicked}" placeholder="County/State (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step1.nextClicked &amp;&amp; wizard.step1.countyError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="label-text">ZIP/POST CODE</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.postCode">
                  </div>
                  <div class="col-sm-6 second-col">
                    <div class="label-text">COUNTRY</div>
                    <select ng-form-control="" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step1.country">
                      <option value="Afghanistan">Afghanistan</option>
                      <option value="Åland Islands">Åland Islands</option>
                      <option value="Albania">Albania</option>
                      <option value="Algeria">Algeria</option>
                      <option value="American Samoa">American Samoa</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Anguilla">Anguilla</option>
                      <option value="Antarctica">Antarctica</option>
                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Aruba">Aruba</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Azerbaijan">Azerbaijan</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bahrain">Bahrain</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Belize">Belize</option>
                      <option value="Benin">Benin</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bhutan">Bhutan</option>
                      <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                      <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                      <option value="Botswana">Botswana</option>
                      <option value="Boubusiness Island">Boubusiness Island</option>
                      <option value="Brazil">Brazil</option>
                      <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                      <option value="Brunei Darussalam">Brunei Darussalam</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Cambodia">Cambodia</option>
                      <option value="Cameroon">Cameroon</option>
                      <option value="Canada">Canada</option>
                      <option value="Cape Verde">Cape Verde</option>
                      <option value="Cayman Islands">Cayman Islands</option>
                      <option value="Central African Republic">Central African Republic</option>
                      <option value="Chad">Chad</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Christmas Island">Christmas Island</option>
                      <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoros">Comoros</option>
                      <option value="Congo">Congo</option>
                      <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                      <option value="Cook Islands">Cook Islands</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                      <option value="Croatia">Croatia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Curaçao">Curaçao</option>
                      <option value="Cyprus">Cyprus</option>
                      <option value="Czech Republic">Czech Republic</option>
                      <option value="Denmark">Denmark</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Dominican Republic">Dominican Republic</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egypt">Egypt</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Ethiopia">Ethiopia</option>
                      <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                      <option value="Faroe Islands">Faroe Islands</option>
                      <option value="Fiji">Fiji</option>
                      <option value="Finland">Finland</option>
                      <option value="France">France</option>
                      <option value="French Guiana">French Guiana</option>
                      <option value="French Polynesia">French Polynesia</option>
                      <option value="French Southern Territories">French Southern Territories</option>
                      <option value="Gabon">Gabon</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Germany">Germany</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Gibraltar">Gibraltar</option>
                      <option value="Greece">Greece</option>
                      <option value="Greenland">Greenland</option>
                      <option value="Grenada">Grenada</option>
                      <option value="Guadeloupe">Guadeloupe</option>
                      <option value="Guam">Guam</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guernsey">Guernsey</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guinea-Bissau">Guinea-Bissau</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                      <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                      <option value="Iraq">Iraq</option>
                      <option value="Ireland">Ireland</option>
                      <option value="Isle of Man">Isle of Man</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japan">Japan</option>
                      <option value="Jersey">Jersey</option>
                      <option value="Jordan">Jordan</option>
                      <option value="Kazakhstan">Kazakhstan</option>
                      <option value="Kenya">Kenya</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                      <option value="Korea, Republic of">Korea, Republic of</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libya">Libya</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Macao">Macao</option>
                      <option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malawi">Malawi</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Maldives">Maldives</option>
                      <option value="Mali">Mali</option>
                      <option value="Malta">Malta</option>
                      <option value="Marshall Islands">Marshall Islands</option>
                      <option value="Martinique">Martinique</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mauritius">Mauritius</option>
                      <option value="Mayotte">Mayotte</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                      <option value="Moldova, Republic of">Moldova, Republic of</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montenegro">Montenegro</option>
                      <option value="Montserrat">Montserrat</option>
                      <option value="Morocco">Morocco</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Namibia">Namibia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Netherlands">Netherlands</option>
                      <option value="New Caledonia">New Caledonia</option>
                      <option value="New Zealand">New Zealand</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Niger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Niue">Niue</option>
                      <option value="Norfolk Island">Norfolk Island</option>
                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                      <option value="Norway">Norway</option>
                      <option value="Oman">Oman</option>
                      <option value="Pakistan">Pakistan</option>
                      <option value="Palau">Palau</option>
                      <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua New Guinea">Papua New Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Peru</option>
                      <option value="Philippines">Philippines</option>
                      <option value="Pitcairn">Pitcairn</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Réunion">Réunion</option>
                      <option value="Romania">Romania</option>
                      <option value="Russian Federation">Russian Federation</option>
                      <option value="Rwanda">Rwanda</option>
                      <option value="Saint Barthélemy">Saint Barthélemy</option>
                      <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                      <option value="Saint Lucia">Saint Lucia</option>
                      <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                      <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                      <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                      <option value="Samoa">Samoa</option>
                      <option value="San Marino">San Marino</option>
                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                      <option value="Saudi Arabia">Saudi Arabia</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Serbia">Serbia</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leone">Sierra Leone</option>
                      <option value="Singapore">Singapore</option>
                      <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                      <option value="Slovakia">Slovakia</option>
                      <option value="Slovenia">Slovenia</option>
                      <option value="Solomon Islands">Solomon Islands</option>
                      <option value="Somalia">Somalia</option>
                      <option value="South Africa">South Africa</option>
                      <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                      <option value="South Sudan">South Sudan</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Sudan">Sudan</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                      <option value="Swaziland">Swaziland</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                      <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                      <option value="Tajikistan">Tajikistan</option>
                      <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Timor-Leste">Timor-Leste</option>
                      <option value="Togo">Togo</option>
                      <option value="Tokelau">Tokelau</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                      <option value="Tunisia">Tunisia</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Turkmenistan">Turkmenistan</option>
                      <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Uganda">Uganda</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Emirates">United Arab Emirates</option>
                      <option value="United Kingdom" selected="selected">United Kingdom</option>
                      <option value="United States">United States</option>
                      <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistan</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                      <option value="Viet Nam">Viet Nam</option>
                      <option value="Virgin Islands, British">Virgin Islands, British</option>
                      <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                      <option value="Wallis and Futuna">Wallis and Futuna</option>
                      <option value="Western Sahara">Western Sahara</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                  </div>
                </div>
                <div class="row buttons-row hidden-xs">
                  <div class="col-xs-12">
                    <div class="buttons">
                      <button class="btn btn-seven btn-cancel ng-hide" ng-click="cancel()" ng-show="showCancel != '-1'">CANCEL</button>
                      <button class="btn btn-three" ng-click="wizard.step1.next()">SAVE AND CONTINUE</button>
                    </div>
                  </div>
                </div>
                <div class="row buttons-row visible-xs">
                  <div class="col-xs-12">
                    <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step1.next()" ng-scroll-to-error=".form-business-details" ng-scroll-to-error-class=".error">SAVE AND CONTINUE</button>
                  </div>
                  <div class="col-xs-12 ng-hide" ng-show="showCancel != '-1'">
                    <button class="btn btn-seven btn-cancel btn-margin-top-10" ng-click="cancel()">CANCEL</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="info-block step1-block map-block" ng-show="wizard.step == 1">
              <div class="title">
                <i class="icon-booking-icon9"></i>Location on map
              </div>
              <div class="map-div">
                <div id="business-map" ng-gmaps-business="" ng-gmaps-markers-draggable="1" ng-gmaps-lat="53.482980" ng-gmaps-lon="-2.233275" ng-gmaps-zoom="13" ng-gmaps-update="0" ng-gmaps-cdn-url="https://topvet.azureedge.net" ng-gmaps-draggable="1" ng-gmaps-double-click="0" ng-gmaps-scroll-wheel="0" ng-gmaps-street-view="0" ng-model="business" class="ng-pristine ng-untouched ng-valid ng-not-empty">
                </div>
              </div>
            </div>
            <div class="info-block step2-block ng-hide" ng-show="wizard.step==2">
              <div class="row one">
                <div class="col-sm-12 col-step-block">
                  <div class="step-block current" ng-class="{'current':wizard.step == 1}">
                    <div class="step current" ng-class="{'current':wizard.step == 1, 'complete': wizard.step > 1}">
                      <div class="step-number">
                        1
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text current" ng-class="{'current':wizard.step == 1}">
                      Business Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 2}">
                    <div class="step" ng-class="{'current':wizard.step == 2, 'complete': wizard.step > 2}">
                      <div class="step-number">
                        2
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 2}">
                      Contact Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 3}">
                    <div class="step" ng-class="{'current':wizard.step == 3, 'complete': wizard.step > 3}">
                      <div class="step-number">
                        3
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 3}">
                      Opening Hours
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 4}">
                    <div class="step" ng-class="{'current':wizard.step == 4, 'complete': wizard.step > 4}">
                      <div class="step-number">
                        4
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 4}">
                      Photo Gallery
                    </div>
                  </div>
                  <!-- ngIf: servicesEnabled == 1 --><div ng-if="servicesEnabled == 1" class="step-block ng-scope" ng-class="{'current':wizard.step == 5}">
                  <div class="step" ng-class="{'current':wizard.step == 5, 'complete': wizard.step > 5}">
                    <div class="step-number">
                      5
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text" ng-class="{'current':wizard.step == 5}">
                    Services
                  </div>
                </div><!-- end ngIf: servicesEnabled == 1 -->
                </div>
              </div>
              <div class="title hidden-xs">
                Tell customers how to get in touch:
              </div>
              <form class="form-contact-details ng-pristine ng-valid">
                <div class="row first-row mobile-row-one">
                  <div class="col-sm-6">
                    <div class="label-text">MOBILE</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="wizard.step2.mobile" ng-class="{'error': !isMobileValid(wizard.step2.mobile) &amp;&amp; wizard.step2.nextClicked}" placeholder="07400 123456">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step2.nextClicked &amp;&amp; wizard.step2.mobileError != ''"></div>
                  </div>
                  <div class="col-sm-6 second-col">
                    <div class="label-text">PHONE</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="wizard.step2.phone" ng-class="{'error': !isPhoneValid(wizard.step2.phone) &amp;&amp; wizard.step2.nextClicked}" placeholder="0121 234 5678">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step2.nextClicked &amp;&amp; wizard.step2.phoneError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="label-text">24HR EMERGENCY NUMBER</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="wizard.step2.servicePhone" ng-class="{'error': wizard.step2.servicePhone != undefined &amp;&amp; wizard.step2.servicePhone != '' &amp;&amp; !isPhoneValid(wizard.step2.servicePhone) &amp;&amp; wizard.step2.nextClicked}" placeholder="0121 234 5678">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step2.nextClicked &amp;&amp; wizard.step2.servicePhoneError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="label-text">EMAIL</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="wizard.step2.email" ng-class="{'error': !isEmailValid(wizard.step2.email) &amp;&amp; wizard.step2.nextClicked}" placeholder="email@yourbusiness.com (required)">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step2.nextClicked &amp;&amp; wizard.step2.emailError != ''"></div>
                  </div>
                  <div class="col-sm-6 second-col">
                    <div class="label-text">Website</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="wizard.step2.website" ng-class="{'error': !isLinkValid(wizard.step2.website) &amp;&amp; wizard.step2.nextClicked}" placeholder="http://www.yourbusiness.com">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step2.nextClicked &amp;&amp; wizard.step2.websiteError != ''"></div>
                  </div>
                </div>
                <div class="title">
                  <i class="icon-settings-icon9"></i>Social
                </div>
                <div class="row first-row">
                  <div class="col-xs-12">
                    <div class="label-text">FACEBOOK</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="wizard.step2.facebook" ng-class="{'error': !isLinkValid(wizard.step2.facebook) &amp;&amp; wizard.step2.nextClicked}" placeholder="https://www.facebook.com/your-business">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step2.nextClicked &amp;&amp; wizard.step2.facebookError != ''"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="label-text">TWITTER</div>
                    <input ng-form-control="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="wizard.step2.twitter" ng-class="{'error': !isLinkValid(wizard.step2.twitter) &amp;&amp; wizard.step2.nextClicked}" placeholder="https://twitter.com/yourbusiness">
                    <div class="input-error ng-binding ng-hide" ng-show="wizard.step2.nextClicked &amp;&amp; wizard.step2.twitterError != ''"></div>
                  </div>
                </div>
                <div class="row buttons-row hidden-xs">
                  <div class="col-sm-6">
                    <button class="btn btn-five btn-back" ng-click="back()">BACK</button>
                  </div>
                  <div class="col-sm-6">
                    <div class="buttons">
                      <button class="btn btn-seven btn-cancel ng-hide" ng-click="cancel()" ng-show="showCancel != '-1'">CANCEL</button>
                      <button class="btn btn-three" ng-click="wizard.step2.next()">SAVE AND CONTINUE</button>
                    </div>
                  </div>
                </div>
                <div class="row buttons-row visible-xs">
                  <div class="col-xs-12">
                    <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step2.next()" ng-scroll-to-error=".form-contact-details" ng-scroll-to-error-class=".error">SAVE AND CONTINUE</button>
                  </div>
                  <div class="col-xs-12" ng-show="showCancel == '-1'">
                    <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
                  </div>
                  <div class="col-xs-12 ng-hide" ng-show="showCancel != '-1'">
                    <div class="row">
                      <div class="col-xs-6">
                        <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
                      </div>
                      <div class="col-xs-6">
                        <button class="btn btn-seven btn-cancel btn-margin-top-10" ng-click="cancel()">CANCEL</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="info-block step3-block ng-hide" ng-show="wizard.step == 3">
              <div class="row one">
                <div class="col-sm-12 col-step-block">
                  <div class="step-block current" ng-class="{'current':wizard.step == 1}">
                    <div class="step current" ng-class="{'current':wizard.step == 1, 'complete': wizard.step > 1}">
                      <div class="step-number">
                        1
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text current" ng-class="{'current':wizard.step == 1}">
                      Business Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 2}">
                    <div class="step" ng-class="{'current':wizard.step == 2, 'complete': wizard.step > 2}">
                      <div class="step-number">
                        2
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 2}">
                      Contact Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 3}">
                    <div class="step" ng-class="{'current':wizard.step == 3, 'complete': wizard.step > 3}">
                      <div class="step-number">
                        3
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 3}">
                      Opening Hours
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 4}">
                    <div class="step" ng-class="{'current':wizard.step == 4, 'complete': wizard.step > 4}">
                      <div class="step-number">
                        4
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 4}">
                      Photo Gallery
                    </div>
                  </div>
                  <!-- ngIf: servicesEnabled == 1 --><div ng-if="servicesEnabled == 1" class="step-block ng-scope" ng-class="{'current':wizard.step == 5}">
                  <div class="step" ng-class="{'current':wizard.step == 5, 'complete': wizard.step > 5}">
                    <div class="step-number">
                      5
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text" ng-class="{'current':wizard.step == 5}">
                    Services
                  </div>
                </div><!-- end ngIf: servicesEnabled == 1 -->
                </div>
              </div>
              <div class="title hidden-xs">
                Let them know when you are available:
              </div>
              <div class="hours mobile-row-one">
                <div class="row hour disabled" ng-class="{'disabled': !wizard.step3.days.mon.opened}">
                  <div class="col-sm-2 hidden-xs">
                    <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.mon.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                      <span class="custom-checkbox-span ">Monday</span>
                    </label>
                  </div>
                  <div class="col-sm-2 visible-xs">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.mon.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                          <span class="custom-checkbox-span ">Monday</span>
                        </label>
                      </div>
                      <div class="col-xs-6 text-right ng-hide" ng-show="wizard.step3.days.mon.opened">
                        <div class="btn-add-hour-mobile" ng-click="wizard.step3.addHour(1)">
                          <i class="icon-add-hour"></i>ADD HOURS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 selects">
                    <!-- ngRepeat: businessHour in wizard.step3.days.mon.businessHours -->
                  </div>
                </div>
                <div class="row hour disabled" ng-class="{'disabled': !wizard.step3.days.tue.opened}">
                  <div class="col-sm-2 hidden-xs">
                    <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.tue.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                      <span class="custom-checkbox-span ">Tuesday</span>
                    </label>
                  </div>
                  <div class="col-sm-2 visible-xs">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.tue.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                          <span class="custom-checkbox-span ">Tuesday</span>
                        </label>
                      </div>
                      <div class="col-xs-6 text-right ng-hide" ng-show="wizard.step3.days.tue.opened">
                        <div class="btn-add-hour-mobile" ng-click="wizard.step3.addHour(2)">
                          <i class="icon-add-hour"></i>ADD HOURS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 selects">
                    <!-- ngRepeat: businessHour in wizard.step3.days.tue.businessHours -->
                  </div>
                </div>
                <div class="row hour disabled" ng-class="{'disabled': !wizard.step3.days.wed.opened}">
                  <div class="col-sm-2 hidden-xs">
                    <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.wed.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                      <span class="custom-checkbox-span ">Wednesday</span>
                    </label>
                  </div>
                  <div class="col-sm-2 visible-xs">
                    <div class="row">
                      <div class="col-xs-7">
                        <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.wed.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                          <span class="custom-checkbox-span ">Wednesday</span>
                        </label>
                      </div>
                      <div class="col-xs-5 no-padding-left text-right ng-hide" ng-show="wizard.step3.days.wed.opened">
                        <div class="btn-add-hour-mobile" ng-click="wizard.step3.addHour(3)">
                          <i class="icon-add-hour"></i>ADD HOURS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 selects">
                    <!-- ngRepeat: businessHour in wizard.step3.days.wed.businessHours -->
                  </div>
                </div>
                <div class="row hour disabled" ng-class="{'disabled': !wizard.step3.days.thu.opened}">
                  <div class="col-sm-2 hidden-xs">
                    <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.thu.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                      <span class="custom-checkbox-span ">Thursday</span>
                    </label>
                  </div>
                  <div class="col-sm-2 visible-xs">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.thu.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                          <span class="custom-checkbox-span ">Thursday</span>
                        </label>
                      </div>
                      <div class="col-xs-6 text-right ng-hide" ng-show="wizard.step3.days.thu.opened">
                        <div class="btn-add-hour-mobile" ng-click="wizard.step3.addHour(4)">
                          <i class="icon-add-hour"></i>ADD HOURS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 selects">
                    <!-- ngRepeat: businessHour in wizard.step3.days.thu.businessHours -->
                  </div>
                </div>
                <div class="row hour disabled" ng-class="{'disabled': !wizard.step3.days.fri.opened}">
                  <div class="col-sm-2 hidden-xs">
                    <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.fri.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                      <span class="custom-checkbox-span ">Friday</span>
                    </label>
                  </div>
                  <div class="col-sm-2 visible-xs">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.fri.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                          <span class="custom-checkbox-span ">Friday</span>
                        </label>
                      </div>
                      <div class="col-xs-6 text-right ng-hide" ng-show="wizard.step3.days.fri.opened">
                        <div class="btn-add-hour-mobile" ng-click="wizard.step3.addHour(5)">
                          <i class="icon-add-hour"></i>ADD HOURS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 selects">
                    <!-- ngRepeat: businessHour in wizard.step3.days.fri.businessHours -->
                  </div>
                </div>
                <div class="row hour disabled" ng-class="{'disabled': !wizard.step3.days.sat.opened}">
                  <div class="col-sm-2 hidden-xs">
                    <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.sat.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                      <span class="custom-checkbox-span ">Saturday</span>
                    </label>
                  </div>
                  <div class="col-sm-2 visible-xs">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.sat.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                          <span class="custom-checkbox-span ">Saturday</span>
                        </label>
                      </div>
                      <div class="col-xs-6 text-right ng-hide" ng-show="wizard.step3.days.sat.opened">
                        <div class="btn-add-hour-mobile" ng-click="wizard.step3.addHour(6)">
                          <i class="icon-add-hour"></i>ADD HOURS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 selects">
                    <!-- ngRepeat: businessHour in wizard.step3.days.sat.businessHours -->
                  </div>
                </div>
                <div class="row hour disabled" ng-class="{'disabled': !wizard.step3.days.sun.opened}">
                  <div class="col-sm-2 hidden-xs">
                    <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.sun.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                      <span class="custom-checkbox-span ">Sunday</span>
                    </label>
                  </div>
                  <div class="col-sm-2 visible-xs">
                    <div class="row">
                      <div class="col-xs-6">
                        <label>
<span class="custom-checkbox">
<input type="checkbox" ng-model="wizard.step3.days.sun.opened" ng-bs-checkbox="" class="ng-pristine ng-untouched ng-valid ng-empty">
</span>
                          <span class="custom-checkbox-span ">Sunday</span>
                        </label>
                      </div>
                      <div class="col-xs-6 text-right ng-hide" ng-show="wizard.step3.days.sun.opened">
                        <div class="btn-add-hour-mobile" ng-click="wizard.step3.addHour(7)">
                          <i class="icon-add-hour"></i>ADD HOURS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 selects">
                    <!-- ngRepeat: businessHour in wizard.step3.days.sun.businessHours -->
                  </div>
                </div>
              </div>
              <div class="row buttons-row hidden-xs">
                <div class="col-sm-6">
                  <button class="btn btn-five btn-back" ng-click="back()">BACK</button>
                </div>
                <div class="col-sm-6">
                  <div class="buttons">
                    <button class="btn btn-seven btn-cancel ng-hide" ng-click="cancel()" ng-show="showCancel != '-1'">CANCEL</button>
                    <button class="btn btn-seven" ng-click="wizard.step3.skip()">SKIP</button>
                    <button class="btn btn-three" ng-click="wizard.step3.next()">SAVE AND CONTINUE</button>
                  </div>
                </div>
              </div>
              <div class="row buttons-row visible-xs" ng-show="showCancel == '-1'">
                <div class="col-xs-12">
                  <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step3.next()">SAVE AND CONTINUE</button>
                </div>
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-6">
                      <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
                    </div>
                    <div class="col-xs-6">
                      <button class="btn btn-seven btn-margin-top-10" ng-click="wizard.step3.skip()">SKIP</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row buttons-row visible-xs ng-hide" ng-show="showCancel != '-1'">
                <div class="col-xs-12">
                  <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step3.next()">SAVE AND CONTINUE</button>
                </div>
                <div class="col-xs-12">
                  <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
                </div>
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-6">
                      <button class="btn btn-seven btn-cancel btn-margin-top-10" ng-click="cancel()">CANCEL</button>
                    </div>
                    <div class="col-xs-6">
                      <button class="btn btn-seven btn-margin-top-10" ng-click="wizard.step3.skip()">SKIP</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="info-block step4-block ng-hide" ng-show="wizard.step == 4">
              <div class="row one">
                <div class="col-sm-12 col-step-block">
                  <div class="step-block current" ng-class="{'current':wizard.step == 1}">
                    <div class="step current" ng-class="{'current':wizard.step == 1, 'complete': wizard.step > 1}">
                      <div class="step-number">
                        1
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text current" ng-class="{'current':wizard.step == 1}">
                      Business Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 2}">
                    <div class="step" ng-class="{'current':wizard.step == 2, 'complete': wizard.step > 2}">
                      <div class="step-number">
                        2
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 2}">
                      Contact Details
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 3}">
                    <div class="step" ng-class="{'current':wizard.step == 3, 'complete': wizard.step > 3}">
                      <div class="step-number">
                        3
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 3}">
                      Opening Hours
                    </div>
                  </div>
                  <div class="step-block" ng-class="{'current':wizard.step == 4}">
                    <div class="step" ng-class="{'current':wizard.step == 4, 'complete': wizard.step > 4}">
                      <div class="step-number">
                        4
                      </div>
                      <div class="step-complete">
                        <i class="icon-booking-icon1"></i>
                      </div>
                    </div>
                    <div class="step-text" ng-class="{'current':wizard.step == 4}">
                      Photo Gallery
                    </div>
                  </div>
                  <!-- ngIf: servicesEnabled == 1 --><div ng-if="servicesEnabled == 1" class="step-block ng-scope" ng-class="{'current':wizard.step == 5}">
                  <div class="step" ng-class="{'current':wizard.step == 5, 'complete': wizard.step > 5}">
                    <div class="step-number">
                      5
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text" ng-class="{'current':wizard.step == 5}">
                    Services
                  </div>
                </div><!-- end ngIf: servicesEnabled == 1 -->
                </div>
              </div>
              <div class="row no-margin-top">
                <div class="col-xs-12">
                  <div class="title title1">
                    <i class="icon-settings-iconc"></i>Business Profile Image
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="header">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="logo">
                          <img class="img-responsive" ng-src="https://topvet.blob.core.windows.net/images/0cc3b304-6b9d-4206-b51e-5c441c4e3bc1-small" src="https://topvet.blob.core.windows.net/images/0cc3b304-6b9d-4206-b51e-5c441c4e3bc1-small">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <form class="ng-pristine ng-valid">
                          <input type="text" name="businessId" ng-model="businessId" ng-hide="true" class="ng-pristine ng-untouched ng-valid ng-not-empty ng-hide">
                          <div class="upload-block">
                            <div class="title1">Upload your Business Photo or Logo</div>
                            <div class="title1 no-margin-top">JPG or PNG up to 10MB</div>
                            <div class="buttons">
                              <button class="btn btn-seven btn-delete ng-hide" ng-click="wizard.step4.removeLogo()" ng-show="wizard.step4.isLogoExist" ng-disabled="wizard.step4.fileLogo.uploading">DELETE</button>
                              <button class="btn btn-seven btn-delete" ng-show="!wizard.step4.isLogoExist" ng-disabled="wizard.step4.fileLogo.uploading">DELETE</button>
                              <div class="fileUpload btn btn-six" ng-disabled="wizard.step4.fileLogo.uploading">
                                <span>Upload</span><i class="icon-my-profile-icon1"></i>
                                <input type="file" class="upload" name="files[]" title=" " ng-jq-upload="/profile/logoupload" ng-jq-upload-starting="wizard.step4.fileLogo.start($data)" ng-jq-upload-success="wizard.step4.fileLogo.success($data)" ng-jq-upload-error="wizard.step4.fileLogo.fail($data)" ng-jq-upload-end="wizard.step4.fileLogo.end()" ng-jq-upload-progress="wizard.step4.fileLogo.progress($data)" ng-jq-upload-max-file-size="10240000">
                              </div>
                            </div>
                            <div class="progress ng-hide" ng-show="wizard.step4.fileLogo.uploading">
                              <div class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ng-style="{'width' : wizard.step4.fileLogo.progressValue + '%'}" style="width: 0%;">
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="title title2">
                    <i class="icon-settings-icond"></i>Business Photo Gallery
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="gallery">
                    <ul class="gallery-sortable">
                      <!-- ngRepeat: image in wizard.step4.images track by $index -->
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row buttons-row hidden-xs">
                <div class="col-sm-6">
                  <button class="btn btn-five btn-back" ng-click="back()">BACK</button>
                </div>
                <div class="col-sm-6">
                  <div class="buttons">
                    <button class="btn btn-seven btn-cancel ng-hide" ng-click="cancel()" ng-show="showCancel != '-1'">CANCEL</button>
                    <button class="btn btn-seven" ng-click="wizard.step4.skip()">SKIP</button>
                    <button class="btn btn-three" ng-click="wizard.step4.next()">SAVE AND CONTINUE</button>
                  </div>
                </div>
              </div>
              <div class="row buttons-row visible-xs" ng-show="showCancel == '-1'">
                <div class="col-xs-12">
                  <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step4.next()">SAVE AND CONTINUE</button>
                </div>
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-6">
                      <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
                    </div>
                    <div class="col-xs-6">
                      <button class="btn btn-seven btn-margin-top-10" ng-click="wizard.step4.skip()">SKIP</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row buttons-row visible-xs ng-hide" ng-show="showCancel != '-1'">
                <div class="col-xs-12">
                  <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step4.next()">SAVE AND CONTINUE</button>
                </div>
                <div class="col-xs-12">
                  <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
                </div>
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-6">
                      <button class="btn btn-seven btn-cancel btn-margin-top-10" ng-click="cancel()">CANCEL</button>
                    </div>
                    <div class="col-xs-6">
                      <button class="btn btn-seven btn-margin-top-10" ng-click="wizard.step4.skip()">SKIP</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ngIf: servicesEnabled == 1 --><div ng-if="servicesEnabled == 1" class="info-block step5-block ng-scope ng-hide" ng-show="wizard.step == 5">
            <div class="row one">
              <div class="col-sm-12 col-step-block">
                <div class="step-block current" ng-class="{'current':wizard.step == 1}">
                  <div class="step current" ng-class="{'current':wizard.step == 1, 'complete': wizard.step > 1}">
                    <div class="step-number">
                      1
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text current" ng-class="{'current':wizard.step == 1}">
                    Business Details
                  </div>
                </div>
                <div class="step-block" ng-class="{'current':wizard.step == 2}">
                  <div class="step" ng-class="{'current':wizard.step == 2, 'complete': wizard.step > 2}">
                    <div class="step-number">
                      2
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text" ng-class="{'current':wizard.step == 2}">
                    Contact Details
                  </div>
                </div>
                <div class="step-block" ng-class="{'current':wizard.step == 3}">
                  <div class="step" ng-class="{'current':wizard.step == 3, 'complete': wizard.step > 3}">
                    <div class="step-number">
                      3
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text" ng-class="{'current':wizard.step == 3}">
                    Opening Hours
                  </div>
                </div>
                <div class="step-block" ng-class="{'current':wizard.step == 4}">
                  <div class="step" ng-class="{'current':wizard.step == 4, 'complete': wizard.step > 4}">
                    <div class="step-number">
                      4
                    </div>
                    <div class="step-complete">
                      <i class="icon-booking-icon1"></i>
                    </div>
                  </div>
                  <div class="step-text" ng-class="{'current':wizard.step == 4}">
                    Photo Gallery
                  </div>
                </div>
                <!-- ngIf: servicesEnabled == 1 --><div ng-if="servicesEnabled == 1" class="step-block ng-scope" ng-class="{'current':wizard.step == 5}">
                <div class="step" ng-class="{'current':wizard.step == 5, 'complete': wizard.step > 5}">
                  <div class="step-number">
                    5
                  </div>
                  <div class="step-complete">
                    <i class="icon-booking-icon1"></i>
                  </div>
                </div>
                <div class="step-text" ng-class="{'current':wizard.step == 5}">
                  Services
                </div>
              </div><!-- end ngIf: servicesEnabled == 1 -->
              </div>
            </div>
            <div class="title">
              Let them know how you can help:
            </div>
            <div class="row services hidden-xs">
              <!-- ngRepeat: service in wizard.step5.orderedServices track by $index -->
            </div>
            <div class="row services visible-xs">
              <!-- ngRepeat: service in wizard.step5.services -->
            </div>
            <div class="row buttons-row hidden-xs">
              <div class="col-sm-6">
                <button class="btn btn-five btn-back" ng-click="back()">BACK</button>
              </div>
              <div class="col-sm-6">
                <div class="buttons">
                  <button class="btn btn-seven btn-cancel ng-hide" ng-click="cancel()" ng-show="showCancel != '-1'">CANCEL</button>
                  <button class="btn btn-seven" ng-click="wizard.step5.skip()">SKIP</button>
                  <button class="btn btn-three" ng-click="wizard.step5.next()">SAVE AND CONTINUE</button>
                </div>
              </div>
            </div>
            <div class="row buttons-row visible-xs" ng-show="showCancel == '-1'">
              <div class="col-xs-12">
                <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step5.next()">SAVE AND CONTINUE</button>
              </div>
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-6">
                    <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
                  </div>
                  <div class="col-xs-6">
                    <button class="btn btn-seven btn-margin-top-10" ng-click="wizard.step5.skip()">SKIP</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row buttons-row visible-xs ng-hide" ng-show="showCancel != '-1'">
              <div class="col-xs-12">
                <button class="btn btn-three btn-margin-top-28" ng-click="wizard.step5.next()">SAVE AND CONTINUE</button>
              </div>
              <div class="col-xs-12">
                <button class="btn btn-five btn-back btn-margin-top-10" ng-click="back()">BACK</button>
              </div>
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-6">
                    <button class="btn btn-seven btn-cancel btn-margin-top-10" ng-click="cancel()">CANCEL</button>
                  </div>
                  <div class="col-xs-6">
                    <button class="btn btn-seven btn-margin-top-10" ng-click="wizard.step5.skip()">SKIP</button>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- end ngIf: servicesEnabled == 1 -->
          </div>
        </div>
      </div>
      <div class="container-fluid signup ng-hide" ng-show="wizard.step == 6">
        <div class="row">
          <div class="col-xs-12 no-padding-left no-padding-right">
            <div class="confirmation-sent">
              <div class="icon">
                <i class="icon-auth-icon1"></i>
              </div>
              <div class="title1">All Done!</div>
              <div class="title2">
                Your business details have been updated and are now live on TopVet.
              </div>
              <a class="btn btn-three" href="/dashboard/">OK</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="business-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 col-sm-push-6 right-block">
            <div class="feedback ">
              <i class="icon-feedback normal"></i><i class="icon-feedback-hover hover"></i> <span>Send Feedback</span>
            </div>
            <div class="help">
              <a href="mailto:jg6t4w18@incoming.intercom.io" class="intercom"><i class="icon-help normal"></i><i class="icon-help-hover hover"></i> Help</a>
            </div>
          </div>
          <div class="col-sm-6 col-sm-pull-6">
            <div class="copyright">
              © 2015-2020 TopVet. All rights reserved.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
  layout: 'basic',

  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>
