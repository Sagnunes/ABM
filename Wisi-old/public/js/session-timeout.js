var SessionTimeoutDemo = function () {

    var initDemo = function () {
        $.sessionTimeout({
            data:{
                '_token':"@csrf",
            },
            title: 'Notificação de tempo limite da sessão',
            message: 'Sua sessão está prestes a expirar.',
            keepAliveUrl: '',
            redirUrl: '/logout',
            logoutUrl: '{{url("logout")}}',
            warnAfter: 3000, //warn after 5 seconds
            redirAfter: 35000, //redirect after 10 seconds,
            ignoreUserActivity: true,
            countdownMessage: 'Redirecionando em {timer} segundos.',
            countdownBar: true,

        });
    };

    return {
        //main function to initiate the module
        init: function () {
            initDemo();
        }
    };

}();

jQuery(document).ready(function() {    
    SessionTimeoutDemo.init();
});