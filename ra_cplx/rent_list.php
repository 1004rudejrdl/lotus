<!-- 작업순서
1. example 폴더를 복사하고 3, 4에 해당하는 폴더명, 파일명으로 작업한다(example_main에서 header, sidenav, footer 형식이
완성된 form을 가져다가 작업할 것)
2. sidenav 링크는 만들면서 추가한다. 각각 폴더에서 만들고
테스트 후 나중에 한번에 링크 하는 방식으로 처리한다.

3. 폴더명 4. 파일명
(영어 단어를 줄여서 약자로 만들었음 이해 안되면 부팀장에게 물어볼 것)

3. 회원(member)
4. 회원가입 : mb_join_
4. 로그인 : me_login_

이성찾기 (meet)
남 : meet_man_XXXX
여 : meet_woman_XXXX
데이트로그/회원현황 : log_gph_XXXX
이상형 설문조사 : srv_XXXX

추천예약 (rec/acm)
맛집 : ra_rst_
숙박 : ra_acmd_
렌트카 : ra_car_

쇼핑몰(shop)
아우터 : sh_outer_
상의 : sh_top_
하의 :sh_bottom_

테스트(test)
연애진단 : tt_diag_
성향테스트 : tt_tend_
컬러테스트 : tt_color_

커뮤니티(commu)
자유게시판 : cm_free_
모임 : cm_gath_
성공후기 : cm_rv_

관리자(admin) (look_project 구조 참고)
(총관리자)(admin_)
(admin_meet_) : admin_meet_man_ , admin_meet_woman_ .....(파일 이름 혹은 서브폴더)
(admin_ra_)
(admin_sh_)
(admin_tt_)
(admin_cm_)

5. 기능에 따른 _뒤에 붙는 말
첫화면(보통 목록이 많음)form : list,main
보는form : view
쓰는/수정하는form : write
DB쿼리form : qurey

예시 : ra_rst_list
→ 맛집을 눌렀을 때 링크 되는 맛집 사진과 목록이 있는 가장 첫화면

만약 더 상세한 폴더가 필요한 경우 4번을 폴더명으로 잡고 작업한다.
예시
회원가입(mb_join)
가입화면 : mb_join_main
가입쿼리문 : mb_join_qurey

6. 클래스 명 등을 지을 때 겹칠 수 있으므로 만드시 상위에 링크된 css명을 확인한다

7. 변수를 지을 때 의미 있게 짓는다.

8. css에 header_sidenav는 웬만 하면 건들이지 않되 .sidenav a { /*서브메뉴 너비 조절*/
부분 수정을 원하는 경우 해당 폴더에 하위로 css폴더를 만들고 그 부분을 덮어쓴다
각자 내용을 채워 넣는 css는 그 파일명에 해당하는 css파일을 만들어서 처리한다. -->
