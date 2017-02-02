<template>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card grey lighten-4">
                <div class="card-content">

                    <form id="create-news"
                          v-on:submit.prevent="createNews()">
                          <fieldset>
                              <legend class="card-title">
                                  Add a news story
                              </legend>

                              <label for="categories">News Category</label>
                              <select id="categories" name="categories" v-model="newsData.category" multiple>
                                  <option value="advertising">Advertising</option>
                                  <option value="alumni">Alumni</option>
                                  <option value="ccr">CCR</option>
                                  <option value="coms">COMS</option>
                                  <option value="emc">EMC</option>
                                  <option value="graduate">Graduate</option>
                                  <option value="hihic">HIHIC</option>
                                  <option value="ms">Media Strategies</option>
                                  <option value="journalism">Journalism</option>
                                  <option value="pr">PR</option>
                              </select>

                              
                          </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>


<script>

</script>


<style>

</style>
