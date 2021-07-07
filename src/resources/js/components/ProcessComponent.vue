<template>
  <div>
    <a>Add item [target open modal]</a>

    <h2>{{ $t('process') }}</h2>
    <form @submit.prevent="addProcess" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Name" v-model="process.name">
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Description" v-model="process.description"></textarea>
      </div>
      <button @click="clearForm()" class="btn btn-danger">Cancel</button>
      <button type="submit" class="btn btn-light">Save</button>
    </form>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchProcess(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>

        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchProcess(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>


      <div class="table-responsive">
        <table class="table table-sm">
          <tr v-for="process in processes" v-bind:key="process.id">
            <td>{{ process.name }} {{ process.id }}</td>

            <td>
              <p>{{ process.description }} ddd</p>
            </td>
            <td>
              <ul>
                <li v-for="tag in process.tags" v-bind:key="tag.id">{{ tag }} </li>

              </ul>

            </td>
            <td>
              <a @click="editProcess(process)" class="btn btn-info">Edit</a>
              <a @click="deleteProcess(process.id)" class="btn btn-danger">Delete</a>
            </td>
          </tr>

        </table>
      </div>

  </div>
</template>

<script>
export default {
  data() {
    return {
      org_slug: org_slug,
      processes: [],
      process: {
        id: '',
        name: '',
        description: ''
      },
      process_id: '',
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchProcess();
  },

  methods: {
    fetchProcess(page_url) {
      let vm = this;
      page_url = page_url || '/api/org-' + this.org_slug + '/process';
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        this.processes = res.data;
        vm.makePagination(res.meta, res.links);
      })
      .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };

      this.pagination = pagination;
    },
    deleteProcess(id) {
      if (confirm('Are You Sure?')) {
        fetch(`/api/org-` + this.org_slug + `/process/${id}`, {
          method: 'delete'
        })
        .then(res => res.json())
        .then(data => {
          alert('Process Removed');
          this.fetchProcess();
        })
        .catch(err => console.log(err));
      }
    },
    addProcess() {
      if (this.edit === false) {
        // Add
        fetch('api/process', {
          method: 'post',
          body: JSON.stringify(this.process),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.clearForm();
          alert('Process Added');
          this.fetchProcess();
        })
        .catch(err => console.log(err));
      } else {
        // Update
        fetch('/api/org-' + this.org_slug + '/process', {
          method: 'put',
          body: JSON.stringify(this.process),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.clearForm();
          alert('Process Updated');
          this.fetchProcess();
        })
        .catch(err => console.log(err));
      }
    },
    editProcess(process) {
      this.edit = true;
      this.process.id = process.id;
      this.process.process_id = process.id;
      this.process.name = process.name;
      this.process.description = process.description;
    },
    clearForm() {
      this.edit = false;
      this.process.id = null;
      this.process.process_id = null;
      this.process.name = '';
      this.process.description = '';
    }
  }
};
</script>
