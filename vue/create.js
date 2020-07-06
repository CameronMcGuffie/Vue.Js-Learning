var createPage= new Vue({
    el: '#create',
    data: {
        dataSaving: false,
        saveSuccess: false,
        loadingText: "Please wait while we try saving...",
        multiAnswers: [[
            { id: 0, name: "" },
            { id: 1, name: "" }
        ]],
        questionList: [
            { id: 0, type: 'multi' }
        ]
    },
    methods: {
        addMulti: function(question_id) {
            var ans_len = !this.multiAnswers[question_id] ? 0 : this.multiAnswers[question_id].length;

            // Handle deleted ID's.
            if(ans_len > 0) {
                ans_len = this.multiAnswers[question_id][ans_len - 1].id + 1;
            }
            
            this.multiAnswers[question_id].push({id: ans_len});
        },
        addQuestion: function(question_id) {
            var qs_len = !this.questionList ? 0 : this.questionList.length;
            
            this.questionList.push({id: qs_len});
            this.multiAnswers.push([{id: 0, name: ""}]);
        },
        delMulti: function(question_id, answer_id) {
            var ans_id = this.multiAnswers[question_id].map(x => {
                return x.id;
            }).indexOf(answer_id);

            this.multiAnswers[question_id].splice(ans_id, 1);
        },
        save: function(question_id) {
            this.dataSaving = true;

            axios.post('/save.php',{ questions: this.questionList, answers: this.multiAnswers })
            .then(response => {
                if(response.status == 200) {
                    this.saveSuccess = true;
                    this.loadingText = "Your test was saved.";
                }
            })
            .catch(error => {
                // To do: Handle 401 (not logged in) 404 (not all data filled in).
                this.dataSaving = false;
                alert("There was an error saving.");
            });
        }
    }
});