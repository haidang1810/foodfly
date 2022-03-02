Authen:
    API: login
        - URL: /foodfly/server/authen.php
        - Method: POST
        - Request: {
            'action': 'login',
            'username': 'danghuynh123',
            'password': 'eqwq123',
            'remember': 1 (1: remember, 2: not remember)
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error"
        }
    API: register
        - URL: /foodfly/server/authen.php
        - Method: POST
        - Request: {
            'action': 'register',
            'fullName': 'hai dang',
            'username': 'danghuynh123',
            'password': 'eqwq123',
            'gmail': 'danghuynh.dev@gmail.com',
            'type': 1
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error"
        }
    API: userList 
        - URL: /foodfly/server/authen.php
        - Method: GET
        - Request: {
            'action': 'list'
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error",
            'userList': [
                    {
                        'username': 'danghuynh123',
                        'gmail': 'danghuynh.dev@gmail.com',
                        'type': 1,
                        'fullName': 'hai dang',
                        'homeTown': "ca mau",
                        'yearBirth': '1999',
                        'phone': '01234718274',
                        'exp': "10 năm",
                        'avatar': "../item/avatar/dang.png"
                    }
                ]
        }
    API: disable
        - URL: /foodfly/server/authen.php
        - Method: POST
        - Request: {
            'action': 'disable',
            'username': 'danghuynh123'
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error"
        }
    API: enable
        - URL: /foodfly/server/authen.php
        - Method: POST
        - Request: {
            'action': 'disable',
            'username': 'danghuynh123'
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error"
        }

