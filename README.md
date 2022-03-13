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
    API: sessionLogin
        - URL: /foodfly/server/authen.php/?action=sessionLogin
        - Method: POST
        - Request: {
            'action': 'sessionLogin'
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'fullName': 'dsáđấ' 
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
                        'phone': '01234718274'
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

Store:
    API: list
        - URL: /foodfly/server/store.php
        - Method: GET
        - Request: {
            'action': 'list'
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error",
            'storeList': [{
                'id': 'fdsfdsewr32342frde23r',
                'name': 'Trà sữa cocco',
                'shopkeeper': '11',
                'avatar': 'fdsfsdgfdgf',
                'address': '3/2 P1 Vĩnh Long',
                'timeOpen': '08:00 - 16:00',
                'segment': 'Cao cấp',
                'priceRange': '25.000 - 100.000',
                'submitDate': '23/3/2021',
                'acceptDate': '25/3/2021',
                'status': 1, (1 còn hoạt động, 0 ngừng kinh doanh)
                'acceptUser': 'danghuynh123'
            }]
        }
    API: detail
        - URL: /foodfly/server/store.php
        - Method: GET
        - Request: {
            'action': 'detail'
        }
        - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error",
            'id': 'fdsfdsewr32342frde23r',
            'name': 'Trà sữa cocco',
            'address': '3/2 P1 Vĩnh Long',
            'timeOpen': '08:00 - 16:00'
            'segment': 'Cao cấp',
            'priceRange': '25.000 - 100.000',
            'imgList': [
                'gdfgfdgdf','rewrewrew','fdsfdsfds'
            ]
        }
    API: register
    - URL: /foodfly/server/store.php
    - Method: POST
    - Request: {
        'action': 'register',
        'name': 'TocoToco Bubble Tea - Phan Đình Phùng',
        'avatar': 'fdsfdsfdsfdsfsfdsfds'
        'address': '50 Phan Đình Phùng, TP. HCM',
        'timeOpen': '08:00 - 16:00'
        'segment': 'Cao cấp',
        'priceRange': '25.000 - 100.000',
    }
    - Response: {
            'status': 1 (1: success, 2: failed),
            'msg': "msg error"
        }