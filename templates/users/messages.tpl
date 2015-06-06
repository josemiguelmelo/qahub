{include file='common/header.tpl'}
{include file='common/navigation.tpl'}


    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body" >
                <span style="margin-bottom: 1%;font-size: large;" class="font-light m-b-xs">

                        Messages

                </span>
                <a style="margin-left:75%;" href={$BASE_URL}pages/users/create_message.php class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> New Message </a>

            </div>
        </div>
    </div>

    {if !empty($all_messages)}
    <div class="hpanel" style="margin-left: 3.6%;margin-right: 3.6%;margin-top:1%;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-mailbox">
                        <tbody>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Subject
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Date
                            </th>

                            <th>
                                Delete
                            </th>
                        </tr>
                        {foreach from=$all_messages item=message}
                            {if $message.seen eq FALSE}
                                <tr class="unread" id={$message.id}>
                                {else}
                                <tr class="" id={$message.id}>
                            {/if}
                                <td>{$message.name}</td>
                                <td> {$message.subject} </td>
                                <td> {$message.content}</td>
                                <td>{date('j.m.Y', strtotime($message.created_at))}</td>
                            <td>
                                <i class="fa fa-trash" data-id={$message.id}>
                                </i>
                            </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {/if}

{include file='common/footer.tpl'}