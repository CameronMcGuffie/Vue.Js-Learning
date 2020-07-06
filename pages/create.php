<h2>Create a Test</h2>

<div id="create"> 
    <div v-if="!dataSaving">
        <center>
            <div class="create_box">
                <div class="create_row">
                    <div class="create_header">Test Name</div>
                    <div class="create_input"><input type="text"></div>
                </div>
            </div>
        </center>
        <br />
        <hr />
        <br />
        <center>
            <div v-for="ql in questionList">
                <div class="create_box">
                    <div class="create_row">
                        <div class="create_header">Question</div>
                        <div class="create_input"><input type="text" name="question_name" /></div>
                    </div>
                    <div class="create_row">
                        <div class="create_header">Question Type</div>
                        <div class="create_input">
                            <select name="question_type">    
                                <option value="multi">Multiple Choice</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div v-for="ma in multiAnswers[ql.id]">
                        <div class="create_row">
                            <div class="create_header">Answer {{ma.id + 1}}</div>
                            <div class="create_input"><input type="text" v-model="ma.name" name="answer_text" /><input type="submit" value="X" v-on:click="delMulti(ql.id, ma.id)" /></div>
                        </div>
                    </div>
                    <div class="create_row">
                        <div class="create_add" v-on:click="addMulti(ql.id)">Add Answer</div>
                    </div>
                    <br />
                </div>
                <br />
            </div>
            <div class="create_row">
                <button v-on:click="save()">Save</button> <button v-on:click="addQuestion()">Add Question</button>
            </div>
        </center>
    </div>
    <div v-if="dataSaving">
        <div class="loading">
            <div class="loading_icon" v-if="!saveSuccess"><div class="loader"></div></div>
            <div class="loading_text">{{loadingText}}</div>
        </div>
    </div>
</div>