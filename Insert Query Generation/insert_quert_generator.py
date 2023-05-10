import names
import random
import datetime
import radar 

"""
abe for brig, keep dob btw 1969 - 1973, joining date btw 1989-1993
for colonel, dob: 1972-75, joining date after 19-21 yrs from dob
for lt. col, 1976-79, joining date 19-21 yrs from dob
for major, 1981-1984 dob, joining date 19-21 yrs ffrom dob
for havildar, 1987-1990
sepoy, 1996-2000 dob, keep joining date as +18 yrs only

"""
print(names.get_full_name())

# user_name = ""
# rank_id = 0
# dob = ""
# joining_date = ""
cur_status = "Idle"
contact = ""
blood_group = ""
post = ""

def query_gen(user_name,rank_id,dob,joining_date,cur_status,contact,blood_group):
    query = f"Insert into Users (User_name, Rank_id, DOB, Joining_date, Cur_Status, Contact, Blood_group) values ('{user_name}' , {rank_id} , '{dob}' , '{joining_date}' , '{cur_status}' , '{contact}' , '{blood_group}');"
    with open('idle_queries.txt', 'a') as f:
        f.write(query)
        f.write("\n")


def random_date(begin,end):
    # Generate random datetime from datetime.datetime values
    x = radar.random_datetime(
        start = datetime.datetime(year=begin,month=1,day=1),
        stop = datetime.datetime(year=end,month=12,day=31)
    )
    # print(x.year,x.month,x.day)
    # return f"{x.year}-{x.month}-{x.day}"
    return x
# print(random_date(2000,2022))

def random_blood_group():
    bg = ["A+","A-","B+","B-","O+","O-","AB+","AB-"]
    opt = random.randint(0,len(bg)-1)
    return bg[opt]

def random_ph_num():
    return str(random.randint(1000000000,9999999999))
# print(random_ph_num())


# # user_name,rank_id,dob,joining_date,cur_status,contact,blood_group,post
# template = f"Insert into Users (User_name, Rank_id, DOB, Joining_date, Cur_Status, Contact, Blood_group, post) values ('{user_name}' , {rank_id} , '{dob}' , '{joining_date}' , '{cur_status}' , '{contact}' , '{blood_group}' , '{post}');"

num_bre = 1
num_col = 2
num_maj = 2
num_hav = 2
num_sep = 12

locations = ['Kashmir','Kerala','Maharashtra']

# query_gen(user_name,rank_id,dob,joining_date,cur_status,contact,blood_group,post)

# done
for bre in range(num_bre):
    dob_obj = random_date(1969,1973)
    dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
    
    joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+21)
    joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
    
    query_gen(names.get_full_name(), 1, dob, joining_date, cur_status, random_ph_num(), random_blood_group())

    # done
    for col in range(num_col):
        # colnel
        dob_obj = random_date(1972,1975)
        dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
    
        joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
        joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
        
        query_gen(names.get_full_name(), 2, dob, joining_date, cur_status, random_ph_num(), random_blood_group())
        
        # --------------------------------------
        # lt_colnel
        dob_obj = random_date(1976,1979)
        dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
    
        joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
        joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
        
        query_gen(names.get_full_name(), 3, dob, joining_date, cur_status, random_ph_num(), random_blood_group())

        # done
        for maj in range(num_maj):
            dob_obj = random_date(1980,1984)
            dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
        
            joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
            joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
            
            query_gen(names.get_full_name(), 4, dob, joining_date, cur_status, random_ph_num(), random_blood_group())
        
            for hav in range(num_hav):
                dob_obj = random_date(1985,1990)
                dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
            
                joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
                joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
                
                query_gen(names.get_full_name(), 5, dob, joining_date, cur_status, random_ph_num(), random_blood_group())
            
                for sep in range(num_sep):
                    dob_obj = random_date(1994,2000)
                    dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
                
                    joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
                    joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
                    
                    query_gen(names.get_full_name(), 6, dob, joining_date, cur_status, random_ph_num(), random_blood_group())


"""
import names
import random
import datetime
import radar 


# abe for brig, keep dob btw 1969 - 1973, joining date btw 1989-1993
# for colonel, dob: 1972-75, joining date after 19-21 yrs from dob
# for lt. col, 1976-79, joining date 19-21 yrs from dob
# for major, 1981-1984 dob, joining date 19-21 yrs ffrom dob
# for havildar, 1987-1990
# sepoy, 1996-2000 dob, keep joining date as +18 yrs only


print(names.get_full_name())

# user_name = ""
# rank_id = 0
# dob = ""
# joining_date = ""
cur_status = "Deployed"
contact = ""
blood_group = ""
post = ""

def query_gen(user_name,rank_id,dob,joining_date,cur_status,contact,blood_group,post):
    query = f"Insert into Users (User_name, Rank_id, DOB, Joining_date, Cur_Status, Contact, Blood_group, post) values ('{user_name}' , {rank_id} , '{dob}' , '{joining_date}' , '{cur_status}' , '{contact}' , '{blood_group}' , '{post}');"
    with open('queries.txt', 'a') as f:
        f.write(query)
        f.write("\n")


def random_date(begin,end):
    # Generate random datetime from datetime.datetime values
    x = radar.random_datetime(
        start = datetime.datetime(year=begin,month=1,day=1),
        stop = datetime.datetime(year=end,month=12,day=31)
    )
    # print(x.year,x.month,x.day)
    # return f"{x.year}-{x.month}-{x.day}"
    return x
# print(random_date(2000,2022))

def random_blood_group():
    bg = ["A+","A-","B+","B-","O+","O-","AB+","AB-"]
    opt = random.randint(0,len(bg)-1)
    return bg[opt]

def random_ph_num():
    return str(random.randint(1000000000,9999999999))
# print(random_ph_num())


# # user_name,rank_id,dob,joining_date,cur_status,contact,blood_group,post
# template = f"Insert into Users (User_name, Rank_id, DOB, Joining_date, Cur_Status, Contact, Blood_group, post) values ('{user_name}' , {rank_id} , '{dob}' , '{joining_date}' , '{cur_status}' , '{contact}' , '{blood_group}' , '{post}');"

num_bre = 3
num_col = 3
num_maj = 3
num_hav = 3
num_sep = 12

locations = ['Kashmir','Kerala','Maharashtra']

# query_gen(user_name,rank_id,dob,joining_date,cur_status,contact,blood_group,post)

# done
for bre in range(num_bre):
    dob_obj = random_date(1969,1973)
    dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
    
    joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+21)
    joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
    
    query_gen(names.get_full_name(), 1, dob, joining_date, cur_status, random_ph_num(), random_blood_group(), locations[bre])

    # done
    for col in range(num_col):
        # colnel
        dob_obj = random_date(1972,1975)
        dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
    
        joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
        joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
        
        query_gen(names.get_full_name(), 2, dob, joining_date, cur_status, random_ph_num(), random_blood_group(), locations[bre])
        
        # --------------------------------------
        # lt_colnel
        dob_obj = random_date(1976,1979)
        dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
    
        joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
        joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
        
        query_gen(names.get_full_name(), 3, dob, joining_date, cur_status, random_ph_num(), random_blood_group(), locations[bre])

        # done
        for maj in range(num_maj):
            dob_obj = random_date(1980,1984)
            dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
        
            joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
            joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
            
            query_gen(names.get_full_name(), 4, dob, joining_date, cur_status, random_ph_num(), random_blood_group(), locations[bre])
        
            for hav in range(num_hav):
                dob_obj = random_date(1985,1990)
                dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
            
                joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
                joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
                
                query_gen(names.get_full_name(), 5, dob, joining_date, cur_status, random_ph_num(), random_blood_group(), locations[bre])
            
                for sep in range(num_sep):
                    dob_obj = random_date(1994,2000)
                    dob = f"{dob_obj.year}-{dob_obj.month}-{dob_obj.day}"
                
                    joining_date_obj = random_date(dob_obj.year+19,dob_obj.year+22)
                    joining_date = f"{joining_date_obj.year}-{joining_date_obj.month}-{joining_date_obj.day}"
                    
                    query_gen(names.get_full_name(), 6, dob, joining_date, cur_status, random_ph_num(), random_blood_group(), locations[bre])
"""