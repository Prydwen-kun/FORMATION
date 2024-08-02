      ******************************************************************
      * Author:
      * Date:
      * Purpose:
      * Tectonics: cobc
      ******************************************************************
       IDENTIFICATION DIVISION.
       PROGRAM-ID. COBOL_TEST.

       DATA DIVISION.
       FILE SECTION.

       WORKING-STORAGE SECTION.
       01 VARIABLE_01 PIC 9(9) VALUE 10500.
       01 VARIABLE_02 PIC A(50) VALUE 'Variable text'.
       01 CUSTOM_VAR03 PIC X(50) VALUE 'Variable Alphanumeric with 9'.
       01 WS-NUM4 PIC 9(6) VALUE 50.

       PROCEDURE DIVISION.
       MAIN-PROCEDURE.
           ACCEPT VARIABLE_02.
           DISPLAY "Variable 01 : "VARIABLE_01.
           IF VARIABLE_02 = 'Variable text' OR VARIABLE_02 = SPACE THEN
               DISPLAY 'No name entered !'
           ELSE
               DISPLAY 'Your name is : ' VARIABLE_02
           END-IF.
           DISPLAY "Variable 02 : "VARIABLE_02.

           STOP RUN.
       END PROGRAM COBOL_TEST.
