<div class="comment">
    <div class="inp-cmt-parent">
        <textarea name="content" class="content-cmt" cols="30" rows="4" placeholder="Để lại bình luận của bạn"></textarea>
        <button class="btn btn-success submit">Gửi</button>
    </div>
    <div class="oup-cmt">
        @foreach($detail->Comment as $item)
            @if($item->parent_id == 0)
                <div class="dis-cmt" data-id="{{$item->id}}">
                    <div class="parent-cmt">
                        <div class="user-cmt">
                            <i class="fa fa-user"></i><strong>{{$detail->Users->find($item->user_id)->name}}</strong>
                        </div>
                        <p>{{$item->content}}</p>
                        <a href="javascript: void (0)" class="reply">Trả lời</a>
                        <span class="time-create">{{date('H:i:s/d-m-Y', strtotime($item->created_at))}}</span>
                    </div>
                    <div class="children-cmt">
                    @foreach($detail->Comment as $itemChild)
                        @if($item->id == $itemChild->parent_id)
                            <div class="con-cmt">
                                <div class="user-cmt"><i class="fa fa-user"></i><strong>{{$detail->Users->find($itemChild->user_id)->name}}</strong></div>
                                <p>{{$itemChild->content}}</p>
                                <a href="javascript: void (0)" class="reply">Trả lời</a> <span class="time-create">{{date('H:i:s/d-m-Y', strtotime($itemChild->created_at))}}</span>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@push('scripts')
<script>
    $(document.body).on('click','.submit', function() {
        var content = $(this).siblings('.content-cmt');
        var value = content.val();
        if(value.trim() == '') {
            alert('Bạn chưa nhập bình luận!');
            content.focus();
        } else {
            $.ajax({
                async: false,
                type: "GET",
                url: "{!! route('comment') !!}",
                data: {
                    content : value,
                    post_id : "{{$detail->id}}"
                },
                success: function(data) {
                    var html = '';
                    html += '<div class="dis-cmt" data-id="' + data.id + '">';
                    html +=     '<div class="parent-cmt">';
                    html +=         '<div class="user-cmt"><i class="fa fa-user"></i><strong>' + data.user_name + '</strong></div>';
                    html +=         '<p>'+ data.content + '</p>';
                    html +=         '<a href="javascript: void (0)" class="reply">Trả lời</a> <span class="time-create">' + data.created + '</span>';
                    html +=     '</div>';
                    html +=     '<div class="children-cmt">';
                    html +=     '</div>';
                    html += '</div>';
                    $(".oup-cmt").prepend(html);
                    content.val('');
                }
            });
        }
    });

    $(document.body).on('click', '.reply',function() {
        var inp_cmt_child = $(this).parents('.dis-cmt').find('.inp-cmt-child');
        if(inp_cmt_child.children().hasClass('content-cmt-child')) {
            inp_cmt_child.children('.content-cmt-child').focus();
        } else {
            var html = '';
            html += '<div class="inp-cmt-child">';
            html +=     '<textarea name="content" class="content-cmt-child" cols="30" rows="3" placeholder="Trả lời bình luận"></textarea>';
            html +=     '<button class="btn btn-success submit-child">Gửi</button>';
            html += '</div>';
            $(this).parents('.dis-cmt').append(html);
        }
    });

    $(document.body).on('click', '.submit-child', function() {
        var content_child = $(this).siblings('.content-cmt-child');
        var value = content_child.val();
        if(value.trim() == '') {
            alert('Bạn chưa nhập bình luận!');
            content_child.focus();
        } else {
            var parent_id = $(this).parents('.dis-cmt').data('id');
            $.ajax({
                async: false,
                type: "GET",
                url: "{!! route('comment') !!}",
                data: {
                    content : value,
                    post_id : "{{$detail->id}}",
                    parent_id : parent_id
                },
                success: function(data) {
                    var html = '';
                    html +=     '<div class="con-cmt">';
                    html +=         '<div class="user-cmt"><i class="fa fa-user"></i><strong>' + data.user_name + '</strong></div>';
                    html +=         '<p>'+ data.content + '</p>';
                    html +=         '<a href="javascript: void (0)" class="reply">Trả lời</a> <span class="time-create">' + data.created + '</span>';
                    html +=     '</div>';
                    content_child.parents('.inp-cmt-child').siblings('.children-cmt').append(html);
                    content_child.val('');
                }
            });
        }
    });
</script>
@endpush