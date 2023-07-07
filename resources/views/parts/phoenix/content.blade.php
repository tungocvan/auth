@php 
    $myAsset = asset('phoenix/assets'); 
@endphp

<form>
                        <div class="mb-3">
                          <label class="form-label" for="basic-form-name">Name</label>
                          <input class="form-control" id="basic-form-name" type="text" placeholder="Name">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-form-email">Email address</label>
                          <input class="form-control" id="basic-form-email" type="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-form-password">Password</label>
                          <input class="form-control" id="basic-form-password" type="password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-form-dob">Date of Birth</label>
                          <input class="form-control" id="basic-form-dob" type="date">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-form-gender">Gender</label>
                          <select class="form-select" id="basic-form-gender" aria-label="Default select example">
                            <option selected="selected">Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <div class="form-check">
                            <input class="form-check-input" id="flexRadioDefault1" type="radio" name="flexRadioDefault">
                            <label class="form-check-label mb-0" for="flexRadioDefault1">Personal Account</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" id="flexRadioDefault2" type="radio" name="flexRadioDefault" checked="checked">
                            <label class="form-check-label mb-0" for="flexRadioDefault2">Business Account</label>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Upload Image</label>
                          <input class="form-control" type="file">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-form-textarea">Description</label>
                          <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                          <input class="form-check-input" id="basic-form-checkbox" type="checkbox">
                          <label class="form-check-label" for="basic-form-checkbox">Remember me</label>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </form>
                    
