<div class="col-12 col-md-6">
  <label for="">Q & A</label>
  <div class="container my-3">
    <div id="text-box-container">
      @foreach(explode(',', $servicedata->question) as $index => $question)
      <div class="text-box mb-3">
        <div class="input-group">
          <input type="text" name="question[]" class="form-control textbox" placeholder="Enter Question {{ $index+1 }}" value="{{ $question }}">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary add-more-textbox" type="button">Add answer</button>
            <button class="btn btn-outline-secondary remove-textbox" type="button" style="{{ $index==0 ? 'display:none;' : '' }}"><span><i class="fa fa-minus" style="font-size:13px;color:red"></i></span></button>
          </div>
        </div>
        <div class="textarea-container">
          @foreach(explode(',', $servicedata->answer)[$index] as $answer)
          <textarea name="answer[]" class="form-control mb-2" placeholder="Enter Answer for Question {{ $index+1 }}">{{ $answer }}</textarea>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
    <button id="add-more-box" class="btn btn-primary" type="button">Add More Question</button>
  </div>
</div>
<script>
  $(document).ready(function() {
    var max_textbox = 5; // maximum number of text boxes
    var max_textarea = 1; // maximum number of text areas under each text box
    var question_index = "{{ count(explode(',', $servicedata->question)) }}"; // index for question IDs
    var answer_index = 1; // index for answer IDs

    // Add text box
    $('#add-more-box').click(function() {
      if ($('.text-box').length < max_textbox) {
        var new_textbox = $('.text-box:last').clone();
        // Increment the question ID
        question_index++;
        new_textbox.find('input:text').attr('id', 'question'+question_index).val('');
        new_textbox.find('input:text').attr('placeholder', 'Enter Question ' + question_index);     
        new_textbox.find('.textarea-container').empty();
        new_textbox.find('.remove-textbox').show(); // show remove button
        $('#text-box-container').append(new_textbox);
      }
    });

    // Add text area
    $('#text-box-container').on('click', '.add-more-textbox', function() {
      if ($(this).closest('.text-box').find('textarea').length < max_textarea) {
        var new_textarea = $('<textarea></textarea>').addClass('form-control mb-2');
        // Increment the answer ID
        answer_index++;
        new_textarea.attr('id', 'answer'+answer_index);
        new_textarea.attr('name', 'answer[]');
        new_textarea.attr('placeholder', 'Enter Answer for Question ' + question_index);
        $(this).closest('.text-box').find('.textarea-container').append(new_textarea);
      }
    });

    // Remove text box
    $('#text-box-container').on('click', '.remove-textbox', function() {
      if ($('.text-box').length > 1) {
        $(this).closest('.text-box').remove();
        question_index--;
      }
      // Hide remove button for first text box
      $('.text-box:first .remove-textbox').hide();
    });
  });
</script>
