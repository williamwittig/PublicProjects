<?php
    include("includes/header.php");
?>

    <div class="container mt-5 pt-3">
      <div class="p-3 d-flex justify-content-center">
        <!--d-flex justify-content-center put in by Daniel-->
        <form id="form" action="action_page.php" method="post">
          <div class="form-group">
            <label for="facilityName">Facility Name: </label>
            <input
              type="text"
              class="form-control textbar"
              id="facilityName"
              name="facilityName"
            />
            <span id="facilityNameError" class="error"
              >Please Select a Facility Name</span
            >
          </div>
          <div class="form-group">
            <label for="city">City: </label>
            <input
              type="text"
              class="form-control textbar"
              id="city"
              name="city"
            />
            <span id="cityError" class="error">Please Select a City</span>
          </div>
          <!-- State Input (Drop Down List) -->
          <div>
            <select
              class="form-control"
              id="state"
              name="state"
              form="form"
              style="width: 248px"
            >
              <option value="">Select Your State</option>
              <option value="AL">Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA">California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="DC">District Of Columbia</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
            <span id="stateError" class="error">Please Select a State</span>
          </div>
          <div class="form-group">
            <label for="recordsPhone">Medical Records Phone: </label>
            <input
              type="tel"
              class="form-control textbar"
              id="recordsPhone"
              name="recordsPhone"
            />
            <span id="recordsPhoneError" class="error"
              >Please Input a Medical Records Phone Number</span
            >
            <span id="recordsPhoneNotTen" class="error"
              >Please Input a Valid Phone Number With 10 Digits</span
            >
          </div>
          <div class="form-group">
            <label for="recordsFax">Medical Records Fax: </label>
            <input
              type="text"
              class="form-control textbar"
              id="recordsFax"
              name="recordsFax"
            />
            <span id="recordsFaxError" class="error"
              >Please Input a Medical Records Fax Number</span
            >
          </div>
          <div class="form-group">
            <label for="libraryPhone">Library Phone: </label>
            <input
              type="text"
              class="form-control textbar"
              id="libraryPhone"
              name="libraryPhone"
            />
            <span id="libraryPhoneError" class="error"
              >Please Input a Library Phone Number</span
            >
          </div>
          <div class="form-group">
            <label for="libraryFax">Library Fax: </label>
            <input
              type="text"
              class="form-control textbar"
              id="libraryFax"
              name="libraryFax"
            />
            <span id="libraryFaxError" class="error"
              >Please Input a Library Fax Number</span
            >
          </div>

          <fieldset class="form-group">
            <label>Scans Available: </label>
            <div class="form-check" id="scans">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  value="Mammogram"
                  name="scans[]"
                />Mammogram
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  value="PATH"
                  name="scans[]"
                />Pathology/labs
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  value="DEXA"
                  name="scans[]"
                />Bone density scan
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  value="MRI"
                  name="scans[]"
                />MRI
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  value="X-Ray"
                  name="scans[]"
                />X-Ray
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  value="CT"
                  name="scans[]"
                />CT
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input
                  type="checkbox"
                  class="form-check-input"
                  value="Ultrasound"
                  name="scans[]"
                />Ultrasound
              </label>
            </div>
            <span id="scansError" class="error">Please Check a Scan Type</span>
          </fieldset>

          <div class="form-group">
            <label>Push Options: </label>

            <div id="push" class="form-check">
              <input
                class="form-check-input pushCheck"
                type="radio"
                value="Push"
                id="flexCheckDefault1"
                name="push"
              />
              <label class="form-check-label" for="flexCheckDefault1">
                Push
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input pushCheck"
                type="radio"
                value="Push Only to Swedish"
                id="flexCheckDefault2"
                name="push"
              />
              <label class="form-check-label" for="flexCheckDefault2">
                Push Only to Swedish
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input pushCheck"
                type="radio"
                value="Not Push"
                id="flexCheckDefault3"
                name="push"
              />
              <label class="form-check-label" for="flexCheckDefault3">
                Not Push
              </label>
            </div>
            <span id="pushError" class="error">Please Check a Push Type</span>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
      ></script>
      <script src="scripts/script.js"></script>
    </div>
    <?php
    include("includes/footer.html");
    ?>
  </body>
</html>


