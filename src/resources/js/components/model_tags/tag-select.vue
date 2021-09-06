<!-- Vue component -->
<template>
  <div class="row">
    <div class="col">
      <div>
        <label class="typo__label">
          <tag-label />
        </label>
        <multiselect
          id="tag_select"
          v-model="value"
          :tag-placeholder="__('app.add_new_tag')"
          :placeholder="__('app.add_new_tag')"
          label="name"
          track-by="name"
          selectLabel="+"
          deselectLabel="-"
          :options="options"
          :multiple="true"
          :loading="isLoading"
          :taggable="true"
          @tag="newTag"
          class="small"
        >
          <template slot="option" slot-scope="props">
            <span
              class="tag-name"
              :style="{
                backgroundColor: props.option.color,
                borderColor: props.option.color,
              }"
            >
              <tag-label />
              {{ props.option.name }}
            </span>
          </template>

          <template slot="tag" slot-scope="props">
            <span
              class="tag-name"
              :style="{
                backgroundColor: props.option.color,
                borderColor: props.option.color,
              }"
            >
              <tag-label />
              {{ props.option.name }}</span
            >
          </template>
        </multiselect>
      </div>
      <button type="button" name="addTags" @click="addTags" class="btn-xs">
        <tag-label class="">{{ __("app.insert") }}</tag-label>
      </button>

      <!-- {{ success }}
      {{ errors }}
      {{ error }} -->
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
// import FormMixin from "../../FormMixin";

// register globally
// Vue.component('multiselect', Multiselect)

export default {
  props: ["process", "categories"],

  components: { Multiselect },
  //   mixins: [FormMixin],
  created() {
    this.fetchTagsData(
      this.process.links.api_resources_tags + "?categories=" + this.categories
    );
  },
  data() {
    return {
      value: [],
      add_new: false,
      options: [],
      loaded: true,
      action: "",
      isLoading: false,
    };
  },
  methods: {
    emitReloadDataEvent() {
      this.$emit("reload-data");
    },
    fetchTagsData(page_url) {
      this.isLoading = true;
      this.emitReloadDataEvent();
      axios
        .get(page_url)
        .then((response) => {
          if (response.status == 200) {
            this.options = response.data.data;
            this.isLoading = false;
          }
        })
        .catch((err) => {
          console.log(err);
        });
      // $('#tag_select').focus();
    },
    newTag(newTagName) {
      // console.log("new tag");
      const new_tag = {
        name: newTagName,
      };
      this.options.push(new_tag);
      this.value.push(new_tag);
      this.addTags();
    },
    addTags() {
      const tags = {
        tags: this.value,
        segment_id: this.snippet.segment_id,
        snippet_start: this.snippet.start,
        snippet_end: this.snippet.end,
      };
      // console.log(tags);
      this.action = this.text.links.api_tag_store;
      this.fields = tags;
      this.snippet.selected = false;
      // this.$emit('add-new-segment-tag', tags);
      // POST to segment_tag this.$emit('add-new-segment-tag', tags)
      this.submitPost();
      // this.emitReloadDataEvent();
    },
  },
};
</script>


<!-- Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>
.multiselect__tags {
  min-height: 32px;
  display: block;
  padding: 3px 40px 0 8px;
  border-radius: 5px;
  border: 1px solid #e8e8e8;
  background: #fff;
  font-size: 14px;
}

.multiselect__tag {
  background: #428bca;
}

.multiselect__tag-icon:hover {
  background: #428bca;
}

.multiselect__tag-icon:focus:after,
.multiselect__tag-icon:hover:after {
  color: #428bca;
}
</style>
